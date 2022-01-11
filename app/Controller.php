<?php

namespace app;

class Controller
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function redirect(string $url)
    {
        header('Location: ' . $url);
        exit();
    }

    protected function isPost(): bool
    {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }
}
