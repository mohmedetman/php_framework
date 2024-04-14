<?php

namespace php_framework\src\File;

class File
{
    private function __construct() {}
    public static function root()
    {
        return ROOT ;
    }
    public static function ds()
    {
        return DS ;
    }
    public static function path($path = null)
    {
       $path =  static::root() . DS . $path;
       $path = str_replace(['/', '\\'], DS, $path);
       return $path;
    }
    public static function exit($path = null)
    {
        return file_exists(static::path($path)) ? static::path($path) : false;
    }
    public static function require_file($path = null)
    {
        return require static::path($path);
    }
    public static function include($path = null)
    {
        return include_once static::path($path);
    }


    public static function require_directory($path) {
        $files = array_diff(scandir(static::path($path)), ['.', '..']);

        foreach($files as $file) {
            $file_path = $path . static::ds() . $file;
            if (static::exit($file_path)) {
                static::require_file($file_path);
            }
        }
    }



}