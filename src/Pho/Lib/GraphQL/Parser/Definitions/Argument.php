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
 * Directives may have **Arguments**
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class Argument extends AbstractDefinition  {

    /**
     * Retrieves the argument value.
     *
     * @return string
     */
    public function value(): string
    {
        return $this->def["value"]["value"];
    }

}