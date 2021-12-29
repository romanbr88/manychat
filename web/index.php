<?php

use app\controllers\DepartmentController;
use app\controllers\EmployeeController;
use app\controllers\ProjectController;
use app\controllers\ReportController;
use app\controllers\SiteController;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config/propel/generated-conf/config.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', SiteController::class . '/actionIndex');

    $r->addRoute('GET', '/department', DepartmentController::class . '/actionIndex');
    $r->addRoute(['GET', 'POST'], '/department/create', DepartmentController::class . '/actionCreate');
    $r->addRoute(['GET', 'POST'], '/department/update/{id:\d+}', DepartmentController::class . '/actionUpdate');
    $r->addRoute('POST', '/department/delete/{id:\d+}', DepartmentController::class . '/actionDelete');

    $r->addRoute('GET', '/employee', EmployeeController::class . '/actionIndex');
    $r->addRoute(['GET', 'POST'], '/employee/create', EmployeeController::class . '/actionCreate');
    $r->addRoute(['GET', 'POST'], '/employee/update/{id:\d+}', EmployeeController::class . '/actionUpdate');
    $r->addRoute('POST', '/employee/delete/{id:\d+}', EmployeeController::class . '/actionDelete');
    $r->addRoute('GET', '/employee/{id:\d+}/project', EmployeeController::class . '/actionListProject');
    $r->addRoute(['GET', 'POST'], '/employee/{id:\d+}/project/add', EmployeeController::class . '/actionAddProject');
    $r->addRoute('POST', '/employee/{id:\d+}/project/delete/{project_id:\d+}', EmployeeController::class . '/actionDeleteProject');

    $r->addRoute('GET', '/project', ProjectController::class . '/actionIndex');
    $r->addRoute(['GET', 'POST'], '/project/create', ProjectController::class . '/actionCreate');
    $r->addRoute(['GET', 'POST'], '/project/update/{id:\d+}', ProjectController::class . '/actionUpdate');
    $r->addRoute('POST', '/project/delete/{id:\d+}', ProjectController::class . '/actionDelete');
    $r->addRoute('GET', '/project/{id:\d+}/employee', ProjectController::class . '/actionListEmployee');
    $r->addRoute(['GET', 'POST'], '/project/{id:\d+}/employee/add', ProjectController::class . '/actionAddEmployee');
    $r->addRoute('POST', '/project/{id:\d+}/employee/delete/{employee_id:\d+}', ProjectController::class . '/actionDeleteEmployee');

    $r->addRoute('GET', '/report', ReportController::class . '/actionIndex');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        var_dump('404 Not Found');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        var_dump('405 Method Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode("/", $handler, 2);
        call_user_func_array(array(new $class, $method), $vars);
        break;
}
