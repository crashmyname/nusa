<?php
namespace App\Core;

use Predis\Client;

class Cache
{
    protected static $redis;

    public static function connect()
    {
        if (!self::$redis) {
            self::$redis = new Client([
                'host' => $_ENV['REDIS_HOST'] ?? '127.0.0.1',
                'port' => $_ENV['REDIS_PORT'] ?? 6379,
            ]);
        }
        return self::$redis;
    }

    public static function get($key)
    {
        return self::connect()->get($key);
    }

    public static function set($key, $value, $ttl = 3600)
    {
        return self::connect()->setex($key, $ttl, json_encode($value));
    }

    public static function remember($key, $ttl, $callback)
    {
        $data = self::get($key);

        if ($data !== null) {
            return json_decode($data, true);
        }

        $data = $callback();

        self::set($key, $data, $ttl);

        return $data;
    }
}