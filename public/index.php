<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

try {
    $app->run();
} catch (\Throwable $e) {
    \App\Exceptions\Handler::handle($e);
}