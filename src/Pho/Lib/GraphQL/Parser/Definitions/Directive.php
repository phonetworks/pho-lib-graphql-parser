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
 * Both entities and fields may have **Directives**
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class Directive extends AbstractDefinition  {

    protected $arguments;

    public function arguments(): array
    {
        return $this->_retrieveAll("arguments","arguments","Argument");
    }

    public function argument(int $n): Argument
    {
        return $this->_retrieveOne("arguments","arguments","Argument", $n);
    }

}