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

/**
 * Makes the child classes debuggable with two simple functions;
 * ```debug()``` and ```dump()```
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
abstract class AbstractDebuggable {

    /**
     * @var array
     */
    protected $def;

    /**
     * Debugs the class
     *
     * @return array
     */
    public function debug(): array
    {
        return $this->def;
    }

    /**
     * Dumps the debug values
     *
     * @return void
     */
    public function dump(): void
    {
        print_r($this->debug());
    }
    
}