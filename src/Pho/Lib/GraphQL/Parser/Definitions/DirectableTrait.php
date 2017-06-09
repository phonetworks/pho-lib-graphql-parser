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
 * Renders the class that uses this trait allowed to contain Directives.
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
trait DirectableTrait {

    /**
     * Returns the entity directives
     *
     * @return array An array of Directive objects or an empty array if no directive found.
     */
    public function directives(): array
    {
        return $this->_retrieveAll("directives", "directives", "Directive");
        /*if(isset($this->directives)) {
            return $this->directives;
        }
        $directives = $this->def["directives"];
        if(!is_array($directives)) {
            $this->directives = [];
            return [];
        }
        foreach($directives as $directive) {
            $this->directives[] = new Directive($directive);
        }
        return $this->directives;*/
    }

    /**
     * Retrieves the entity directive at given position
     *
     * @param int $n The position.
     * 
     * @return Directive The directive object.
     */
    public function directive(int $n): Directive
    {
        return $this->_retrieveOne("directives", "directives", "Directive", $n);
        /*if(isset($this->directives[$n])) {
            return $this->directives[$n];
        }
        if(isset($this->def["directives"][$n])) {
            return new Directive($this->def["directives"][$n]);
        }
        return new Directive();*/
    }

}