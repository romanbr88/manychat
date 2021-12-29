<?php

namespace app\controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseController
{
    protected Environment $view;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../views');
        $this->view = new Environment($loader);
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
