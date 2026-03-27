<?php
namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{
    public static function init()
    {
        $capsule = new Capsule;

        $default = Config::get('database.default');

        $connection = Config::get("database.connections.$default");

        $capsule->addConnection($connection);

        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}