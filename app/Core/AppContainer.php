<?php
namespace App\Core;

use DI\Container;

class AppContainer
{
    public static function build()
    {
        return new Container();
    }
}