<?php
namespace App\Core;

use Predis\Client;

class Queue
{
    protected static function redis()
    {
        return new Client();
    }

    public static function push($queue, $data)
    {
        self::redis()->rpush($queue, json_encode($data));
    }

    public static function pop($queue)
    {
        $data = self::redis()->lpop($queue);
        return $data ? json_decode($data, true) : null;
    }
}