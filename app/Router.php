<?php

namespace app;

class Router
{
    protected static array $routes = [];

    protected static array $route = [];

    public static function add(string $regexp, array $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function matchRoute(string $url): bool
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    $route[$key] = $value;
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch(string $url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'controllers\\' . self::$route['controller'];
            if (class_exists($controller)) {
                $class = new $controller();
                $action = 'action' . ucfirst(self::$route['action']);
                if (method_exists($class, $action)) {
                    $class->$action();
                } else {
                    echo 'Метод <b>' . $controller . '->' . $action . '</b> не найден';
                }
            } else {
                echo 'Контроллер <b>' . $controller . '</b> не найден';
            }
        } else {
            http_response_code(404);
            include_once '404.html';
        }
    }

    protected static function removeQueryString(string $url): string
    {
        $params = explode('?', $url, 2);
        if (!strpos($params[0], '=')) {
            return rtrim($params[0], '/');
        } else {
            return '';
        }
    }
}
