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


class ListedSchemaTest extends \PHPUnit\Framework\TestCase {

    private $parsed;

    public function setUp() {
        $this->parsed = new Parse(__DIR__."/assets/ListedSchema.graphql");
    }

    public function tearDown() {
        unset($this->parsed);
    }

    public function testLists() {
        $this->assertEquals(1, $this->parsed->count());
        $this->assertEquals("Listed", $this->parsed->entity(0)->name());
        
        $this->assertTrue($this->parsed->entity(0)->field(0)->list());
        $this->assertEquals("Obj", $this->parsed->entity(0)->field(0)->type());

        $this->assertFalse($this->parsed->entity(0)->field(1)->list());
        $this->assertEquals("Obj", $this->parsed->entity(0)->field(1)->type());

        $this->assertTrue($this->parsed->entity(0)->field(2)->list());
        $this->assertEquals("Obj", $this->parsed->entity(0)->field(2)->type());

        $this->assertFalse($this->parsed->entity(0)->field(3)->list());
        $this->assertEquals("Obj", $this->parsed->entity(0)->field(3)->type());
    }

    public function testNativity() 
    {
        $this->assertTrue($this->parsed->entity(0)->field(4)->native());
        $this->assertTrue($this->parsed->entity(0)->field(5)->native());
        $this->assertTrue($this->parsed->entity(0)->field(6)->native());
        $this->assertTrue($this->parsed->entity(0)->field(7)->native());
        $this->assertFalse($this->parsed->entity(0)->field(8)->native());
    }

}