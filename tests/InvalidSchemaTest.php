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


class InvalidSchemaTest extends \PHPUnit\Framework\TestCase {


    public function testNoSchemaException() {
        $this->expectException(\Pho\Lib\GraphQL\Parser\Exceptions\FileNotFoundException::class);
        $parsed = new Parse(__DIR__."/assets/DoesNotExist.graphql");
    }

    public function testInvalidSchemaException() {
        $this->expectException(\Pho\Lib\GraphQL\Parser\Exceptions\InvalidSchemaException::class);
        $parsed = new Parse(__DIR__."/assets/SnapSchema.graphql");
    }

}