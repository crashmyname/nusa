<?php
use App\Core\Application;
use App\Core\Config;
use App\Core\Database;
use App\Helpers\Route;
use App\Middlewares\AuthMiddleware;
use Dotenv\Dotenv;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

if (env('APP_DEBUG', false)) {
    $whoops = new Run;
    $whoops->pushHandler(new PrettyPageHandler);
    $whoops->register();
}

Config::load(__DIR__.'/../config');

$app = new Application();

Route::alias([
    'auth' => AuthMiddleware::class,
    'jwt' => JwtMiddleware::class,
]);

Database::init();

$app->init();

return $app;