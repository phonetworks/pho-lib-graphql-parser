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


class SchemaWithMultipleDefinitionsTest extends \PHPUnit\Framework\TestCase {

    private $parsed;

    public function setUp() {
        $this->parsed = new Parse(__DIR__."/assets/WikiPageSchema.graphql");
    }

    public function tearDown() {
        unset($this->parsed);
    }

    public function testCountSchema() {
        $this->assertEquals(2, $this->parsed->count());
    }

}