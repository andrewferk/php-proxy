<?php
namespace andrewferk\File\tests;

use andrewferk\File\JSON;

class JSONTest extends \PHPUnit_Framework_TestCase {

    public static $myJSON;

    public static function setUpBeforeClass() {
        static::$myJSON = new JSON(dirname(__FILE__) . "/my.json");
    }

    public function testParseNumber() {
        $this->assertEquals(1, self::$myJSON->node()->number);
    }

    public function testUseIncludePath() {
        $beforeIncludePath = get_include_path();
        set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__));
        $json = new JSON("my.json", true);
        $this->assertEquals(1, $json->node()->number);
        set_include_path($beforeIncludePath);
    }
}
