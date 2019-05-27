<?php

/*
 * This file is part of the Pho package.
 *
 * (c) Emre Sokullu <emre@phonetworks.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pho\Lib\GraphQL\Parser;

use Pho\Lib\GraphQL\Parser\Definitions\Entity;
use GraphQL\Utils\BuildSchema;
use GraphQL\Utils\AST;
use GraphQL\Language\Parser;
use Generator;

/**
 * Parses GraphQL schema into Pho Entity Definition
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class Parse extends AbstractDebuggable {

    private $ast;

    /**
     * Constructor
     *
     * @param string $graphql The graphql file.
     * 
     * @throws  Exceptions\FileNotFoundException if the file can't be found.
     * @throws  Exceptions\MissingExtensionException if any of the LibGraphQLParser library or the GraphQL-Parser-PHP extension is missing.
     * @throws  Exceptions\InvalidSchemaException if the schema is invalid or corrupt.
     */
    public function __construct(string $graphql) 
    {
        if(!file_exists($graphql)) {
            throw new Exceptions\FileNotFoundException($graphql);
        }

        $contents = \file_get_contents($graphql);
        $c_ext = boolval(getenv("LIBGRAPHQL_ON"));
        $parser = null;

        if($c_ext) {
            try {
                $parser = new \GraphQL\Parser(); 
            }
            catch(\Exception $e) {
                error_log("Missing C Extensions"); 
                // don't fail
                // throw new Exceptions\MissingExtensionException();
            }
        }
        
        try {
            if(!is_null($parser)) {
                $this->ast = $parser->parse($contents); 
            }
            else {
                $schema = Parser::parse($contents);
                $this->ast = AST::toArray($schema);
            }
        }
        catch(\Exception $e) {
            throw new Exceptions\InvalidSchemaException($graphql, $e);
        }

        $this->def = $this->ast; // for Debuggable compatibility
    }

    /**
     * Returns the number of definitions in the GraphQL file.
     *
     * @return int The number of definitions.
     */
    public function count(): int
    {
        return count($this->ast["definitions"]);
    }

    /**
     * Yields the entities.
     * 
     * Aka definitions in GraphQL lingo.
     *
     * @return \Generator
     */
    public function entities(): Generator
    {
        foreach($this->ast["definitions"] as $definition) {
            yield new Entity($definition);
        }
    }

    /**
     * Fetches an entity with given key.
     *
     * @param int $n Key.
     * 
     * @return Entity
     */
    public function entity(int $n): Entity
    {
        return new Entity($this->ast["definitions"][$n]);
    }

}
