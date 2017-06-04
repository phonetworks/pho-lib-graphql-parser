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

/**
 * Primary definition in a GraphQL file
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class Node extends AbstractDefinition {

    use DirectableTrait;
    
    protected $implementations;
    protected $directives;
    protected $fields;


    public function implementations(): array
    {
        return $this->_retrieveAll("implementations", "interfaces", "Implementation");
    }

    public function implementation(int $n): Implementation
    {
        return $this->_retrieveOne("implementations", "interfaces", "Implementation", $n);
    }

    public function fields(): array
    {
        return $this->_retrieveAll("fields", "fields", "Field");
    }

    public function field(int $n): Field
    {
        return $this->_retrieveOne("fields", "fields", "Field", $n);
    }

}