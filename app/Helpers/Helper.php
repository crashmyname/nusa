<?php

use App\Core\Config;
use App\Core\Response;

function response()
{
    return new Response();
}

function url($path = '')
{
    $base = rtrim(Config::get('app.url'), '/');

    return $base . '/' . ltrim($path, '/');
}