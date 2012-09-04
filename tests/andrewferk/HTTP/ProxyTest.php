<?php
namespace andrewferk\HTTP\tests;

use andrewferk\HTTP\Proxy;

class ProxyTest extends \PHPUnit_Framework_TestCase {

    public static $beforeIncludePath;

    public static function setUpBeforeClass() {
        self::$beforeIncludePath = get_include_path();
        set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__));
    }

    public static function tearDownAfterClass() {
        set_include_path(self::$beforeIncludePath);
    }

    public function testProxyIsAProxy() {
        $proxy = new Proxy();
        $this->assertEquals("andrewferk\HTTP\Proxy", get_class($proxy));
    }

    public function testMakeRequestReturnsARequest() {
        $http_server_vars = array();
        $request = Proxy::makeRequest($http_server_vars);
        $this->assertEquals("andrewferk\HTTP\Request", get_class($request));
    }

    public function testMakeRequestParsesInputs() {
        $http_server_vars = array(
            "REQUEST_URI" => "/api/status"
        );
        $request = Proxy::makeRequest($http_server_vars);
        $this->assertEquals($http_server_vars["REQUEST_URI"], $request->getRootRequestURI());
    }

    public function testProxyParsesDefaultConfig() {
        $proxy = new Proxy();
        $this->assertEquals("/api/", $proxy->getConfig()->node()->request->base_uri);
    }
}
