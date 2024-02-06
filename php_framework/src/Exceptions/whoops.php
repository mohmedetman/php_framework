<?php 
namespace php_framework\src\Exceptions ;
 class whoops {
    private function __construct()
    {
       
    } 
    public static function handle() {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }   
 }