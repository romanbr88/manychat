<?php

namespace app;

class View
{
    public function render(string $template, array $vars = [])
    {
        extract($vars);

        $fileView = __DIR__ . '/../views/' . $template . '.php';
        ob_start();
        if (is_file($fileView)) {
            require_once $fileView;
        } else {
            echo '<p>Не найден вид <b>' . $fileView . '</b></p>';
        }
        $content = ob_get_clean();

        require_once __DIR__ . '/../views/layout/layout.php';
    }
}
