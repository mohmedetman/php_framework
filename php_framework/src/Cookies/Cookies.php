<?php
namespace php_framework\src\Cookies;

class Cookies {
    private function __construct()
    {
        
    }
    public static function set($key,$value) {
     $_COOKIE[$key] = $value ;
     setcookie($key, $value, time() + (86400 * 30), "/"); // 86400 = 1 day

     return $value ;
    }
    public static function has($key){
        return isset($_COOKIE[$key]);
    }
    public static function get($key){
    return static::has($key) ? $_COOKIE[$key] : 'null';
    }
    public static function remove($key){
        unset($_COOKIE[$key]);
        setcookie($key, null, '-1', "/"); // 86400 = 1 day

    }
    public static function all() {
        return $_COOKIE ;
    }
    public static function destroy() {
        foreach (static::all() as $key=>$value) {
            static::remove($key);
        }
    }
    public  static function flash ($key) {
        $value = '' ;
        if (static::has($key)){
         $value = static::get($key) ;
         static::remove($key);
        }
        return $value ;

    }
}
