<?php

namespace HirotoK\JSON5\Tests;

use HirotoK\JSON5\Parser;
use stdClass;

/**
 * Class ParserTest
 *
 * @package HirotoK\JSON5\Tests
 */
class ParserTest extends \PHPUnit_Framework_TestCase {

  public function testParseExampleJson5()
  {
    $json5 = file_get_contents(JSON5_FILE_DIR."/example.json5");
    $parser = new Parser($json5);
    $this->assertInstanceOf(Parser::class, $parser);
    $json = $parser->parse();
    $this->assertInstanceOf(stdClass::class, $json);
    $this->assertEquals('bar', $json->foo);
    $this->assertTrue($json->while);
    $this->assertEquals(INF, $json->to);
  }

  public function testParsePackageJson5()
  {
    $json5 = file_get_contents(JSON5_FILE_DIR."/package.json5");
    $parser = new Parser($json5);
    $this->assertInstanceOf(Parser::class, $parser);
    $json = $parser->parse();
    $this->assertInstanceOf(stdClass::class, $json);
    $this->assertEquals('json5', $json->name);
    $this->assertInstanceOf(stdClass::class, $json->contributors);
    $this->assertTrue(isset($json->scripts->build));
    $this->assertTrue(isset($json->scripts->test));
  }

  public function testParseWithAssocExampleJson5() {
    $json5 = file_get_contents(JSON5_FILE_DIR."/example.json5");
    $parser = new Parser($json5);
    $this->assertInstanceOf(Parser::class, $parser);
    $json = $parser->parse(true);
    $this->assertTrue(is_array($json));
    $this->assertEquals('bar', $json["foo"]);
    $this->assertTrue($json["while"]);
    $this->assertEquals(INF, $json["to"]);
  }

  public function testParseWithAssocPackageJson5()
  {
    $json5 = file_get_contents(JSON5_FILE_DIR."/package.json5");
    $parser = new Parser($json5);
    $this->assertInstanceOf(Parser::class, $parser);
    $json = $parser->parse(true);
    $this->assertTrue(is_array($json));
    $this->assertEquals('json5', $json["name"]);
    $this->assertTrue(is_array($json["contributors"]));
    $this->assertTrue(isset($json["scripts"]["build"]));
    $this->assertTrue(isset($json["scripts"]["test"]));
  }

}