<?php
namespace App\Core;

class Config
{
    protected static $items = [];

    public static function load($path)
    {
        foreach (glob($path . '/*.php') as $file) {
            $key = basename($file, '.php');
            self::$items[$key] = require $file;
        }
    }

    public static function get($key, $default = null)
    {
        $keys = explode('.', $key);

        $config = self::$items;

        foreach ($keys as $segment) {
            if (!isset($config[$segment])) {
                return $default;
            }
            $config = $config[$segment];
        }

        return $config;
    }

    public static function set(array $items)
    {
        self::$items = $items;
    }
}