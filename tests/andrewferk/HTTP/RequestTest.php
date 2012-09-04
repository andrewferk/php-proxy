<?php
namespace andrewferk\HTTP\tests;

use andrewferk\HTTP\Request;

class RequestTest extends \PHPUnit_Framework_TestCase {
    public function testParseRequestURI() {
        $http_server_vars = array(
            "REQUEST_URI" => "/api/status"
        );
        $request = new Request($http_server_vars);
    }
}
