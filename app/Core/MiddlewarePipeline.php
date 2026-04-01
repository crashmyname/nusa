<?php
namespace App\Core;

class MiddlewarePipeline
{
    protected $middlewares = [];

    public function add($middleware)
    {
        if (is_string($middleware)) {
            $mapped = Config::get("middleware.$middleware");

            if ($mapped) {
                $middleware = $mapped;
            }
        }
        $this->middlewares[] = $middleware;
    }

    public function handle($request, $destination)
    {
        $pipeline = array_reduce(
            array_reverse($this->middlewares),
            function ($next, $middleware) {
                return function ($request) use ($middleware, $next) {
                    return (new $middleware)->handle($request, $next);
                };
            },
            $destination
        );

        return $pipeline($request);
    }
}