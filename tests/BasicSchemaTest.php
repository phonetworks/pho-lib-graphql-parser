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


class BasicSchemaTest extends \PHPUnit\Framework\TestCase {

    private $parsed;

    public function setUp() {
        $this->parsed = new Parse(__DIR__."/assets/BasicSchema.graphql");
    }

    public function tearDown() {
        unset($this->parsed);
    }

    public function testBasicSchema() {
        
        $this->assertEquals(1, $this->parsed->count());
        $this->assertEquals("Basic", $this->parsed->entity(0)->name());
        $this->assertEquals("Something", $this->parsed->entity(0)->implementations()[0]->name());
        $this->assertCount(3, iterator_to_array($this->parsed->entities())[0]->fields());
    }

    public function testNonNullableIDField() {   
        $field = iterator_to_array($this->parsed->entities())[0]->field(0);
        $this->assertEquals("id", $field->name());
        $this->assertFalse($field->nullable());
        $this->assertEquals("ID", $field->type());
    }

    public function testNonNullableStringField() {   
        $field = iterator_to_array($this->parsed->entities())[0]->field(1);
        $this->assertEquals("context", $field->name());
        $this->assertFalse($field->nullable());
        $this->assertEquals("String", $field->type());
    }
        
    public function testNullableCustomField() {
        $field = iterator_to_array($this->parsed->entities())[0]->field(2);
        $this->assertEquals("user", $field->name());
        $this->assertTrue($field->nullable());
        $this->assertEquals("User", $field->type());
    }

}