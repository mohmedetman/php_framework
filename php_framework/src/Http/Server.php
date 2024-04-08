<?php

namespace php_framework\src\Http;

class Server
{
    private function __construct() {}
     public  static  function all()
     {
         return $_SERVER ;
     }
     public static function has($key)
     {
         return isset($_SERVER[$key]);
     }
     public static function get($key)
     {
         return static::has($key) ? $_SERVER[$key] : null;
     }
}