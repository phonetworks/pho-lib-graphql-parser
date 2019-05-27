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
 * Thrown if any of the LibGraphQLParser library or the GraphQL-Parser-PHP extension is missing.
 * 
 * @deprecated 2.0 No longer in use, because we have a pure PHP fallback.
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class MissingExtensionException extends \Exception {
    public function __construct(\Exception $e) {
        parent::__construct();
        $this->message = "Missing dependencies. LibGraphQLParser library and the GraphQL-Parser-PHP extension must be installed.";
    }
}