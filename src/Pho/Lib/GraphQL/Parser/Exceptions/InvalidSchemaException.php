<?php

/*
 * This file is part of the Pho package.
 *
 * (c) Emre Sokullu <emre@phonetworks.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Pho\Lib\GraphQL\Parser\Exceptions;

/**
 * Thrown if the schema is invalid or corrupt.
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class InvalidSchemaException extends \Exception {
    public function __construct(\Exception $e) {
        parent::__construct();
        $this->message = sprintf("Invalid schema: %s", $e->message);
    }
}