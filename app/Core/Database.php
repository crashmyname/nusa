<?php
namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{
    protected static $booted = false;

    public static function init()
    {
        if (self::$booted) {
            return;
        }

        $capsule = new Capsule;

        $default = Config::get('database.default');
        $connection = Config::get("database.connections.$default");

        $capsule->addConnection($connection);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        self::$booted = true;
    }
}