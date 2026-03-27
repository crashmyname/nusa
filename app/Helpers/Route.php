<?php
namespace App\Helpers;

class Route
{
    protected static $router;
    protected static $aliases = [];

    public static function setRouter($router)
    {
        self::$router = $router;
    }

    public static function get($uri, $action)
    {
        return self::$router->get($uri, $action);
    }

    public static function post($uri, $action)
    {
        return self::$router->post($uri, $action);
    }

    public static function group($prefix, $callback)
    {
        return self::$router->group($prefix, $callback);
    }

    public static function middleware($middlewares)
    {
        $middlewares = self::resolveMiddleware($middlewares);

        return self::$router->middleware($middlewares);
    }

    public static function alias($aliases)
    {
        self::$aliases = $aliases;
    }

    public static function resolveMiddleware($middlewares)
    {
        return array_map(function ($mw) {
            return self::$aliases[$mw] ?? $mw;
        }, $middlewares);
    }
}