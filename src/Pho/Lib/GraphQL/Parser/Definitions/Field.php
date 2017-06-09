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
 * Entities contain **Fields**
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class Field extends AbstractDefinition  {

    use DirectableTrait;

    public function nullable(): bool 
    {
        return ! (isset($this->def["type"]["kind"]) && $this->def["type"]["kind"] == "NonNullType");
    }

    public function type(): string
    {
        if(!$this->nullable())
            return $this->def["type"]["type"]["name"]["value"];
        else
            return $this->def["type"]["name"]["value"];
    }

}