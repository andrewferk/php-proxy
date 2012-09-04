<?php
namespace andrewferk\HTTP;

use \andrewferk\File\JSON as JSON;

class Proxy {

    private $config;

    public function __construct($config_location = "proxy.json") {
        $this->config = new JSON($config_location, true);
    }

    public static function makeRequest($http_server_vars) {
        $request = new Request($http_server_vars);
        return $request;
    }

    public function getConfig() {
        return $this->config;
    }
}
