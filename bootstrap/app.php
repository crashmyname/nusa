<?php
use App\Core\Application;
use App\Core\Config;
use App\Core\Database;
use App\Helpers\Route;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\JwtMiddleware;
use Dotenv\Dotenv;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

if (!isset($_ENV['APP_ENV'])) {
    $dotenv = Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();
}

if (env('APP_DEBUG', false)) {
    $whoops = new Run;
    $whoops->pushHandler(new PrettyPageHandler);
    $whoops->register();
}

$configCache = __DIR__.'/../storage/cache/config.php';

if (file_exists($configCache)) {
    Config::set(require $configCache);
} else {
    Config::load(__DIR__.'/../config');
}

$app = new Application();

Route::alias([
    'auth' => AuthMiddleware::class,
    'jwt' => JwtMiddleware::class,
]);

Database::init();

$app->init();

return $app;