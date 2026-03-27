<?php
namespace App\Core;

use FastRoute;

class Router
{
    protected $routes = [];
    protected $routeMiddlewares = [];
    protected $currentMiddlewares = [];
    protected $currentGroupPrefix = '';

    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    public function group($prefix, $callback)
    {
        $previousPrefix = $this->currentGroupPrefix;

        $this->currentGroupPrefix = $previousPrefix . $prefix;

        $callback($this);

        $this->currentGroupPrefix = $previousPrefix;
    }

    protected function addRoute($method, $uri, $action)
    {
        $uri = ($this->currentGroupPrefix ?? '') . $uri;

        $this->routes[] = [
            $method,
            $uri,
            [
                'action' => $action,
                'middlewares' => $this->currentMiddlewares ?? []
            ]
        ];

        $this->currentMiddlewares = [];
    }

    public function middleware($middlewares)
    {
        $previousMiddlewares = $this->currentMiddlewares;
        $this->currentMiddlewares = array_merge(
            $previousMiddlewares,
            $middlewares
        );
        return $this;
    }

    public function dispatch()
    {
        $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
            foreach ($this->routes as $route) {
                [$method, $uri, $handler] = $route;
                $r->addRoute($method, $uri, $handler);
            }
        });

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $basePath = '/nusa/backend/public';

        if (strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }

        if ($uri === '') {
            $uri = '/';
        }

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                http_response_code(404);
                echo "404 Not Found";
                break;

            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                http_response_code(405);
                echo "Method Not Allowed";
                break;

            case FastRoute\Dispatcher::FOUND:

                $handlerData = $routeInfo[1];
                $vars = $routeInfo[2];

                $action = $handlerData['action'];
                $middlewares = $handlerData['middlewares'];

                $pipeline = new \App\Core\MiddlewarePipeline();

                // global middleware
                foreach (\App\Core\Application::$globalMiddlewares as $mw) {
                    $pipeline->add($mw);
                }

                // route middleware
                foreach ($middlewares as $mw) {
                    $pipeline->add($mw);
                }

                return $pipeline->handle($vars, function($vars) use ($action) {

                    if (is_array($action)) {
                        [$controller, $method] = $action;
                        return (new $controller)->$method($vars);
                    }

                    return call_user_func($action, $vars);
                });
        }
    }
}