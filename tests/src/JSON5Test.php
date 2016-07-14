<?php

namespace HirotoK\JSON5\Tests;

use HirotoK\JSON5\JSON5;
use SplFileObject;
use stdClass;

/**
 * Class JSON5Test
 *
 * @package HirotoK\JSON5\Tests
 */
class JSON5Test extends \PHPUnit_Framework_TestCase {

  public function testDecodeExampleJson5()
  {
    $json5 = file_get_contents(JSON5_FILE_DIR."/example.json5");
    $json  = JSON5::decode($json5);
    $this->assertInstanceOf(stdClass::class, $json);
  }

  public function testDecodePackageJson5()
  {
    $json5 = file_get_contents(JSON5_FILE_DIR."/package.json5");
    $json  = JSON5::decode($json5);
    $this->assertInstanceOf(stdClass::class, $json);
  }

  public function testDecodeWithAssocExampleJson5() {
    $json5 = file_get_contents(JSON5_FILE_DIR."/example.json5");
    $json  = JSON5::decode($json5, true);
    $this->assertTrue(is_array($json));
  }


  public function testDecodeWithAssocPackageJson5() {
    $json5 = file_get_contents(JSON5_FILE_DIR."/package.json5");
    $json  = JSON5::decode($json5, true);
    $this->assertTrue(is_array($json));
  }

  public function testDecodeFileStringExampleJson5()
  {
    $json = JSON5::decodeFile(JSON5_FILE_DIR."/example.json5");
    $this->assertInstanceOf(stdClass::class, $json);
  }

  public function testDecodeFileStringPackageJson5()
  {
    $json = JSON5::decodeFile(JSON5_FILE_DIR."/package.json5");
    $this->assertInstanceOf(stdClass::class, $json);
  }

  public function testDecodeFileStringWithAssocExampleJson5()
  {
    $json = JSON5::decodeFile(JSON5_FILE_DIR."/example.json5", true);
    $this->assertTrue(is_array($json));
  }

  public function testDecodeFileStringWithAssocPackageJson5()
  {
    $json = JSON5::decodeFile(JSON5_FILE_DIR."/package.json5", true);
    $this->assertTrue(is_array($json));
  }

  public function testDecodeFileSplExampleJson5()
  {
    $spl = new SplFileObject(JSON5_FILE_DIR."/example.json5");
    $json = JSON5::decodeFile($spl);
    $this->assertInstanceOf(stdClass::class, $json);
  }

  public function testDecodeFileSplPackageJson5()
  {
    $spl = new SplFileObject(JSON5_FILE_DIR."/package.json5");
    $json = JSON5::decodeFile($spl);
    $this->assertInstanceOf(stdClass::class, $json);
  }

  public function testDecodeFileSplWithAssocExampleJson5()
  {
    $spl = new SplFileObject(JSON5_FILE_DIR."/example.json5");
    $json = JSON5::decodeFile($spl, true);
    $this->assertTrue(is_array($json));
  }

  public function testDecodeFileSplWithAssocPackageJson5()
  {
    $spl = new SplFileObject(JSON5_FILE_DIR."/package.json5");
    $json = JSON5::decodeFile($spl, true);
    $this->assertTrue(is_array($json));
  }

}