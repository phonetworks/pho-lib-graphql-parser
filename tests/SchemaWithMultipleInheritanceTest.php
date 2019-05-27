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
 * This test is skipped for the version of this library
 * which depends on webonyx/graphql-php
 * because webonyx/graphql-php does NOT support multiple inheritance.
 * 
 * Since multiple inheritance is NOT used across Pho Networks
 * packages, we kept the pure PHP webonyx/graphql-php lib.
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
class SchemaWithMultipleInheritanceTest extends \PHPUnit\Framework\TestCase {

    private $parsed;

    public function setUp() {
        return;
        $this->parsed = new Parse(__DIR__."/assets/SchemaWithMultipleInheritance.graphql");
    }

    public function tearDown() {
        return;
        unset($this->parsed);
    }

    public function testMultipleInheritance() {
        return;
        $this->assertEquals("Something", $this->parsed->entity(0)->implementation(0)->name());
        $this->assertEquals("SomethingElse", $this->parsed->entity(0)->implementation(1)->name());
        $this->assertEquals("SomethingNoComma", $this->parsed->entity(1)->implementation(0)->name());
        $this->assertEquals("SomethingElseNoComma", $this->parsed->entity(1)->implementation(1)->name());
    }

}