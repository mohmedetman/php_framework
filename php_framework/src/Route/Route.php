<?php

namespace php_framework\src\Route;

class Route
{
    private static $routes = [];
    private  static $perfix ;
    private static $middleware ;
    private function __construct() {}
    private static function add($methods, $uri, $callback) {
        $uri = trim($uri, '/');
        $uri = rtrim(static::$perfix . '/' . $uri, '/');
        $uri = $uri?:'/';
        foreach(explode('|', $methods) as $method) {
            static::$routes[] = [
                'uri' => $uri,
                'callback' => $callback,
                'method' => $method,
                'middleware' => static::$middleware,
            ];
        }
    }

    public static function get($url, $call_back)
   {
        static::add('GET', $url, $call_back);
   }
   public static function post($url, $call_back){
         static::add('POST', $url, $call_back);
   }
   public static function allRoutes() {
        return static::$routes;
   }
    public static function prefix($prefix, $callback) {
        $parent_prefix = static::$prefix;
        static::$prefix .= '/' . trim($prefix, '/');
        if (is_callable($callback)) {
            call_user_func($callback);
        } else {
            throw new \BadFunctionCallException("Please provide valid callback function");
        }

        static::$prefix = $parent_prefix;
    }

    /**
     * Set middleware for routing
     *
     * @param string $middleware
     * @param callback $callback
     */
    public static function middleware($middleware, $callback) {
        $parent_middleware = static::$middleware;
        static::$middleware .= '|' . trim($middleware, '|');
        if (is_callable($callback)) {
            call_user_func($callback);
        } else {
            throw new \BadFunctionCallException("Please provide valid callback function");
        }

        static::$middleware = $parent_middleware;
    }

}