<?php
namespace App\Core;

use FastRoute;

class Router
{
    protected $routes = [];
    protected $routeMiddlewares = [];
    protected $currentMiddlewares = [];
    protected $currentGroupPrefix = '';
    public array $registeredRoutes = [];

    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
        return $this;
    }

    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
        return $this;
    }
    
    public function put($uri, $action)
    {
        $this->addRoute('PUT', $uri, $action);
        return $this;
    }

    public function patch($uri, $action)
    {
        $this->addRoute('PATCH', $uri, $action);
        return $this;
    }

    public function delete($uri, $action)
    {
        $this->addRoute('DELETE', $uri, $action);
        return $this;
    }

    public function options($uri, $action)
    {
        $this->addRoute('OPTIONS', $uri, $action);
        return $this;
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

        $route = [
            $method,
            $uri,
            [
                'action' => $action,
                'middlewares' => $this->currentMiddlewares ?? []
            ]
        ];

        $this->routes[] = $route;

        $this->registeredRoutes[] = $route;

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

    public function setCachedRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch()
    {
        $dispatcher = FastRoute\cachedDispatcher(function(FastRoute\RouteCollector $r) {
            foreach ($this->routes as $route) {
                [$method, $uri, $handler] = $route;
                $r->addRoute($method, $uri, $handler);
            }
        }, [
            'cacheFile' => __DIR__ . '/../../storage/cache/fast_route.php',
            'cacheDisabled' => !env('ROUTE_CACHE', false),
        ]);

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
                        return $this->resolve($controller)->$method($vars);
                    }

                    return call_user_func($action, $vars);
                });
        }
    }

    protected function resolve($class)
    {
        $reflection = new \ReflectionClass($class);

        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new $class;
        }

        $params = $constructor->getParameters();

        $dependencies = [];

        foreach ($params as $param) {
            $type = $param->getType();

            if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                $dependencies[] = $this->resolve($type->getName());
            } else {
                throw new \Exception("Cannot resolve dependency: {$param->getName()}");
            }
        }

        return $reflection->newInstanceArgs($dependencies);
    }
}