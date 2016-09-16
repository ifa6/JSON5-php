<?php

/*
 * This file is part of JSON5-php.
 *
 * (c) Hiroto Kitazawa <hiro.yo.yo1610@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HirotoK\JSON5\Tests;

use HirotoK\JSON5\JSON5;
use SplFileObject;
use stdClass;

/**
 * Class JSON5Test.
 *
 * @package HirotoK\JSON5\Tests
 */
class JSON5Test extends \PHPUnit_Framework_TestCase
{
    public function testDecodeExampleJson5()
    {
        $json5 = file_get_contents(JSON5_FILE_DIR.'/example.json5');
        $json  = JSON5::decode($json5);
        $this->assertInstanceOf(stdClass::class, $json);
        $this->assertEquals('bar', $json->foo);
        $this->assertEquals(0.5, $json->half);
    }

    public function testDecodePackageJson5()
    {
        $json5 = file_get_contents(JSON5_FILE_DIR.'/package.json5');
        $json  = JSON5::decode($json5);
        $this->assertInstanceOf(stdClass::class, $json);
        $this->assertEquals('json5', $json->name);
        $this->assertInstanceOf(stdClass::class, $json->contributors);
        $this->assertEquals('git', $json->repository->type);
    }

    public function testDecodeWithAssocExampleJson5()
    {
        $json5 = file_get_contents(JSON5_FILE_DIR.'/example.json5');
        $json  = JSON5::decode($json5, true);
        $this->assertTrue(is_array($json));
        $this->assertEquals('bar', $json['foo']);
        $this->assertEquals(0.5, $json['half']);
    }

    public function testDecodeWithAssocPackageJson5()
    {
        $json5 = file_get_contents(JSON5_FILE_DIR.'/package.json5');
        $json  = JSON5::decode($json5, true);
        $this->assertTrue(is_array($json));
        $this->assertEquals('json5', $json['name']);
        $this->assertTrue(is_array($json['contributors']));
        $this->assertEquals('git', $json['repository']['type']);
    }

    public function testDecodeFileStringExampleJson5()
    {
        $json = JSON5::decodeFile(JSON5_FILE_DIR.'/example.json5');
        $this->assertInstanceOf(stdClass::class, $json);
        $this->assertEquals('bar', $json->foo);
        $this->assertEquals(0.5, $json->half);
    }

    public function testDecodeFileStringPackageJson5()
    {
        $json = JSON5::decodeFile(JSON5_FILE_DIR.'/package.json5');
        $this->assertInstanceOf(stdClass::class, $json);
        $this->assertEquals('json5', $json->name);
        $this->assertInstanceOf(stdClass::class, $json->contributors);
        $this->assertEquals('git', $json->repository->type);
    }

    public function testDecodeFileStringWithAssocExampleJson5()
    {
        $json = JSON5::decodeFile(JSON5_FILE_DIR.'/example.json5', true);
        $this->assertTrue(is_array($json));
        $this->assertEquals('bar', $json['foo']);
        $this->assertEquals(0.5, $json['half']);
    }

    public function testDecodeFileStringWithAssocPackageJson5()
    {
        $json = JSON5::decodeFile(JSON5_FILE_DIR.'/package.json5', true);
        $this->assertTrue(is_array($json));
        $this->assertEquals('json5', $json['name']);
        $this->assertTrue(is_array($json['contributors']));
        $this->assertEquals('git', $json['repository']['type']);
    }

    public function testDecodeFileSplExampleJson5()
    {
        $spl  = new SplFileObject(JSON5_FILE_DIR.'/example.json5');
        $json = JSON5::decodeFile($spl);
        $this->assertInstanceOf(stdClass::class, $json);
        $this->assertEquals('bar', $json->foo);
        $this->assertEquals(0.5, $json->half);
    }

    public function testDecodeFileSplPackageJson5()
    {
        $spl  = new SplFileObject(JSON5_FILE_DIR.'/package.json5');
        $json = JSON5::decodeFile($spl);
        $this->assertInstanceOf(stdClass::class, $json);
        $this->assertEquals('json5', $json->name);
        $this->assertInstanceOf(stdClass::class, $json->contributors);
        $this->assertEquals('git', $json->repository->type);
    }

    public function testDecodeFileSplWithAssocExampleJson5()
    {
        $spl  = new SplFileObject(JSON5_FILE_DIR.'/example.json5');
        $json = JSON5::decodeFile($spl, true);
        $this->assertTrue(is_array($json));
        $this->assertEquals('bar', $json['foo']);
        $this->assertEquals(0.5, $json['half']);
    }

    public function testDecodeFileSplWithAssocPackageJson5()
    {
        $spl  = new SplFileObject(JSON5_FILE_DIR.'/package.json5');
        $json = JSON5::decodeFile($spl, true);
        $this->assertTrue(is_array($json));
        $this->assertEquals('json5', $json['name']);
        $this->assertTrue(is_array($json['contributors']));
        $this->assertEquals('git', $json['repository']['type']);
    }
}
