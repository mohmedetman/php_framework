<?php

namespace php_framework\src\Http;

use PhpParser\Node\Stmt\Static_;

class Request
{
   private static $base_url;
   private static $request_url;
   private static $queryString;
   //    private static $full_url ;
   public static function handle()
   {
      // return 'reer';
      static::getBaseUrl();
      //    static::fullUrl() ;
   }
   public static function getHttp()
   {
      return Server::get('REQUEST_SCHEME') . '://';
   }
   public static function getServeName()
   {
      return Server::get('SERVER_NAME');
   }
   public static function getScripteName()
   {
      return dirname(Server::get('SCRIPT_NAME'));
   }
   public static function  getRequestUrl()
   {
      return Server::get('REQUEST_URI');
   }
   public static function requestUrl()
   {
      return urldecode(static::getRequestUrl());
   }
   public static function  getFullUrl()
   {

      $request_uri = rtrim(preg_replace("#^" . static::getScripteName() . '#', '', static::requestUrl()), '/');
      if (strpos($request_uri, '?') !== false) {
         list($request_url, $queryString) = explode('?', $request_uri);
      }
      echo $request_url;
   }
   public static function getUrl()
   {
      static::$base_url =
         static::getHttp()
         . static::getServeName() .
         str_replace('//', '', static::getScripteName());
   }
   public static function getBaseUrl()
   {
      return static::$base_url;
   }
   public static function method()
   {
      return Server::get('REQUEST_METHOD');
   }
   public static function has($key, $type)
   {
      return array_key_exists($key, $type);
   }
   public static function value($key, $type)
   {
      $type = isset($type) ? $type : $_REQUEST;
      return static::has($key, $type) ? $type[$key] : 'null';
   }
   public static function get($key)
   {
      return static::value($key, $_GET);
   }
   public static function set($key, $value)
   {
      $_REQUEST[$key] = $value;
      $_GET[$key] = $value;
      $_POST[$key] = $value;
      return $value;
   }


   // public static function has ($type,$key) {
   //    return array_key_exists($type,$key);
   // }
   // public static function value ($key,array $type = null){
   //    $type = isset($type) ? $type : $_REQUEST ;
   //    return static::has($type,$key)?$type[$key]:'null';
   // }
   // public static function get($key) {
   //    return static::value($key,$_GET);
   // }
   // public static function post($key) {
   //    return $_POST[$key];
   // }
}
