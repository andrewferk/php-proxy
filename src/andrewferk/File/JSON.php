<?php
namespace andrewferk\File;

class JSON {

    private $filename;
    private $json;

    public function __construct($filename, $use_include_path = false) {
        $this->filename = $filename;
        $json = file_get_contents($this->filename, $use_include_path);
        $this->json = json_decode($json);
    }

    public function node() {
        return $this->json;
    }
}
