<?php

/*
 * This file is part of the Pho package.
 *
 * (c) Emre Sokullu <emre@phonetworks.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pho\Lib\GraphQL\Parser\Definitions;

use Pho\Lib\GraphQL\Parser\AbstractDebuggable;

/**
 * The base library for GraphQL definitions
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
abstract class AbstractDefinition extends AbstractDebuggable {

    /**
     * Constructor
     *
     * @param array $def The AST definition extracted from the Parser
     */
    public function __construct(array $def)
    {
        $this->def = $def;
        unset($this->def["loc"]);
        unset($this->def["kind"]);
    }

    /**
     * Returns the node name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->def["name"]["value"];
    }

    /**
     * A helper method to retrieve an array of a specific type from the given GraphQL definition.
     *
     * @param string $internally What the object in question is called internally.
     * @param string $graphql What the object in question is called in GraphQL definition AST.
     * @param string $class What class the object in question is associated within this parser.
     * 
     * @return array An array of objects in question.
     */
    protected function _retrieveAll(string $internally, string $graphql, string $class): array
    {
        if(isset($this->$internally)) {
            return $this->$internally;
        }
        $sought = $this->def[$graphql];
        if(!is_array($sought)) {
            $this->$internally = [];
            return [];
        }
        $class = "\\".__NAMESPACE__."\\".$class;
        foreach($sought as $s) {
            $this->$internally[] = new $class($s);
        }
        return $this->$internally;
    }

    /**
     * A helper method to retrieve a single object of a specific type, at given position,
     * from the given GraphQL definition.
     *
     * @param string $internally What the object in question is called internally.
     * @param string $graphql What the object in question is called in GraphQL definition AST.
     * @param string $class What class the object in question is associated within this parser.
     * @param int $n Position.
     * 
     * @return mixed A parser definition type as defined by the 3rd parameter of this method.
     */
    protected function _retrieveOne(string $internally, string $graphql, string $class, int $n) // : mixed
    {
        if(isset($this->$internally[$n])) {
            return $this->$internally[$n];
        }
        if(isset($this->def[$graphql][$n])) {
            $class = "\\".__NAMESPACE__."\\".$class;
            return new $class($this->def[$graphql][$n]);
        }
        return new $class();
    }

}