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


class SchemaWithDirectivesTest extends \PHPUnit\Framework\TestCase {

    private $parsed;

    public function setUp() {
        $this->parsed = new Parse(__DIR__."/assets/BlogPostSchema.graphql");
    }

    public function tearDown() {
        unset($this->parsed);
    }

    public function testRoot() {
        $this->assertEquals(1, $this->parsed->count());
        $this->assertEquals("BlogPost", $this->parsed->entity(0)->name());
        $directives = $this->parsed->entity(0)->directives();
        $this->assertCount(3, $directives);
    }

    public function testRootDirective1() {
        $this->assertEquals("is_a", $this->parsed->entity(0)->directive(0)->name());
        $this->assertCount(1, $this->parsed->entity(0)->directive(0)->arguments());
        $this->assertEquals("type", $this->parsed->entity(0)->directive(0)->argument(0)->name());
        $this->assertEquals("Object", $this->parsed->entity(0)->directive(0)->argument(0)->value());
    }

    public function testRootDirective2() {
        $this->assertEquals("extends", $this->parsed->entity(0)->directive(1)->name());
        $this->assertCount(1, $this->parsed->entity(0)->directive(1)->arguments());
        $this->assertEquals("type", $this->parsed->entity(0)->directive(1)->argument(0)->name());
        $this->assertEquals("Content", $this->parsed->entity(0)->directive(1)->argument(0)->value());
    }

    public function testRootDirective3() {
        $this->assertEquals("permissions", $this->parsed->entity(0)->directive(2)->name());
        $this->assertCount(2, $this->parsed->entity(0)->directive(2)->arguments());
        $this->assertEquals("mod", $this->parsed->entity(0)->directive(2)->argument(0)->name());
        $this->assertEquals("01777", $this->parsed->entity(0)->directive(2)->argument(0)->value());
        $this->assertEquals("mask", $this->parsed->entity(0)->directive(2)->argument(1)->name());
        $this->assertEquals("00002", $this->parsed->entity(0)->directive(2)->argument(1)->value());
    }

    public function testFieldDirectives() {
        $this->assertEquals("title", $this->parsed->entity(0)->field(0)->name());
        $this->assertEquals("String", $this->parsed->entity(0)->field(0)->type());
        $this->assertFalse($this->parsed->entity(0)->field(0)->nullable());
        $this->assertCount(4, $this->parsed->entity(0)->field(0)->directives());
    }

    public function testFieldDirectiveArgument0() {
        $this->assertEquals("constraints", $this->parsed->entity(0)->field(0)->directive(0)->name());
        $this->assertCount(1, $this->parsed->entity(0)->field(0)->directive(0)->arguments());
        $this->assertEquals("max_length", $this->parsed->entity(0)->field(0)->directive(0)->argument(0)->name());
        $this->assertEquals("255", $this->parsed->entity(0)->field(0)->directive(0)->argument(0)->value());
    }

    public function testFieldDirectiveArgument1() {
        $this->assertEquals("setter", $this->parsed->entity(0)->field(0)->directive(1)->name());
        $this->assertCount(0, $this->parsed->entity(0)->field(0)->directive(1)->arguments());
    }

}