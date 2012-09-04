<?php
namespace andrewferk\HTTP;

class Request {

    private $http_server_vars;

    public function __construct($http_server_vars) {
        $this->http_server_vars = $http_server_vars;
    }

    private function getServerVar($var) {
        return $this->http_server_vars[$var];
    }

    public function getRootRequestURI() {
        return $this->getServerVar("REQUEST_URI");
    }

}
