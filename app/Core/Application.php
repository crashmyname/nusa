<?php
namespace App\Core;

use App\Helpers\Route;

class Application
{
    public Router $router;
    public static $globalMiddlewares = [
        \App\Middlewares\CorsMiddleware::class
    ];

    public function __construct()
    {
        $this->router = new Router();

        Route::setRouter($this->router);
    }

    public function init()
    {
        $this->registerRoutes();
        $this->loadModules();
    }

    protected function registerRoutes()
    {
        require __DIR__.'/../../routes/www.php';
    }

    protected function loadModules()
    {
        $basePath = __DIR__.'/../Modules';

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($basePath)
        );

        $files = [];

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getFilename() === 'Routes.php') {
                $files[] = $file->getPathname();
            }
        }

        sort($files);

        foreach ($files as $route) {
            require $route;
        }
    }

    public function run()
    {
        $this->router->dispatch();
    }
}