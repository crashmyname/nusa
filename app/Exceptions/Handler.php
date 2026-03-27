<?php
namespace App\Exceptions;

class Handler
{
    public static function handle(\Throwable $e)
    {
        $debug = env('APP_DEBUG', false);

        $isAjax = self::isAjax();

        if ($debug) {
            throw $e;
        }

        if ($isAjax) {
            http_response_code(500);
            $status = method_exists($e, 'getStatusCode')
            ? $e->getStatusCode()
            : 500;
            return response()->json([
                'error' => $status === 500 ? 'Internal Server Error' : $e->getMessage()
            ], $status);
        }

        http_response_code(500);

        require __DIR__.'/../../resources/views/errors/500.php';
    }

    protected static function isAjax()
    {
        return (
            isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'
        ) || str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json');
    }
}