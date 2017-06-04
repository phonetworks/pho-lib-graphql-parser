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
 * Thrown if the file can't be found.
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class FileNotFoundException extends \Exception {
    public function __construct(string $file) {
        parent::__construct();
        $this->message = sprintf("%s not found", $file);
    }
}