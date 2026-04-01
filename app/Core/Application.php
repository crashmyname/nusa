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
        $useCache = env('ROUTE_CACHE', false);

        if ($useCache) {
            if (!\App\Core\RouteCache::exists()) {
                $this->registerRoutes();
                $this->loadModules();

                \App\Core\RouteCache::store($this->router->registeredRoutes);
            }

            $this->router->setCachedRoutes(
                \App\Core\RouteCache::load()
            );
        } else {
            $this->registerRoutes();
            $this->loadModules();
        }
    }

    protected function registerRoutes()
    {
        require __DIR__.'/../../routes/www.php';
    }

    protected function loadModules()
    {
        $cacheFile = __DIR__.'/../../storage/cache/module_paths.php';

        if (file_exists($cacheFile)) {
            $files = require $cacheFile;
        } else {
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

            file_put_contents($cacheFile, '<?php return ' . var_export($files, true) . ';');
        }

        foreach ($files as $route) {
            require $route;
        }
    }

    public function run()
    {
        $this->router->dispatch();
    }
}