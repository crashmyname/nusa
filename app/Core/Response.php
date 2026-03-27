<?php
namespace App\Core;

class Response
{
    public function json($data, $status = 200, $headers = [])
    {
        http_response_code($status);

        header('Content-Type: application/json');

        foreach ($headers as $key => $value) {
            header("$key: $value");
        }

        echo json_encode($data);
        exit;
    }

    public function make($content, $status = 200, $headers = [])
    {
        http_response_code($status);

        foreach ($headers as $key => $value) {
            header("$key: $value");
        }

        echo $content;
        exit;
    }

    public function redirect($url, $status = 302)
    {
        header("Location: $url", true, $status);
        exit;
    }

    public function view($view, $data = [])
    {
        extract($data);

        $viewPath = __DIR__ . '/../../resources/views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            return $this->make("View not found", 404);
        }

        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        return $this->make($content);
    }
}