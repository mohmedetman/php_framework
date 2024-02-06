<?php

namespace php\Bootstrap;
use php_framework\src\Exceptions\whoops;

class Application {
 
    private function __construct() {}

    public static function run() {
       
        define('ROOT', realpath(__DIR__.'/..'));
        define('DS', DIRECTORY_SEPARATOR);
        Whoops::handle();
        // throw new \Exception('gfgfsgf');
    }
}