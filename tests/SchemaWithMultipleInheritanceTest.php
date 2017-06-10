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


class SchemaWithMultipleInheritanceTest extends \PHPUnit\Framework\TestCase {

    private $parsed;

    public function setUp() {
        $this->parsed = new Parse(__DIR__."/assets/SchemaWithMultipleInheritance.graphql");
    }

    public function tearDown() {
        unset($this->parsed);
    }

    public function testMultipleInheritance() {
        $this->assertEquals("Something", $this->parsed->entity(0)->implementation(0)->name());
        $this->assertEquals("SomethingElse", $this->parsed->entity(0)->implementation(1)->name());
        $this->assertEquals("SomethingNoComma", $this->parsed->entity(1)->implementation(0)->name());
        $this->assertEquals("SomethingElseNoComma", $this->parsed->entity(1)->implementation(1)->name());
    }

}