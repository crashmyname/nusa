<?php
namespace App\Core;

class Controller
{
    protected function json($data, $status = 200)
    {
        return response()->json($data, $status);
    }

    protected function success($data = [], $message = 'OK')
    {
        return $this->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function error($message = 'Error', $status = 400)
    {
        return $this->json([
            'success' => false,
            'message' => $message
        ], $status);
    }
}