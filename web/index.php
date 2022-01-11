<?php

use app\Router;

require_once __DIR__ . '/../autoload.php';

$query = rtrim($_SERVER['REQUEST_URI'], '/');

Router::add('^/department$', ['controller' => 'DepartmentController']);
Router::add('^/department/(?P<action>[a-z-]+)$', ['controller' => 'DepartmentController']);

Router::add('^/employee/project$', ['controller' => 'ProjectEmployeeController', 'action' => 'listProjects']);
Router::add('^/employee/project/create$', ['controller' => 'ProjectEmployeeController', 'action' => 'addProjectToEmployee']);
Router::add('^/employee/project/delete$', ['controller' => 'ProjectEmployeeController', 'action' => 'delete']);
Router::add('^/project/employee$', ['controller' => 'ProjectEmployeeController', 'action' => 'listEmployees']);
Router::add('^/project/employee/create$$', ['controller' => 'ProjectEmployeeController', 'action' => 'addEmployeeToProject']);
Router::add('^/project/employee/delete$$', ['controller' => 'ProjectEmployeeController', 'action' => 'delete']);

Router::add('^/employee$', ['controller' => 'EmployeeController']);
Router::add('^/employee/(?P<action>[a-z-]+)$', ['controller' => 'EmployeeController']);

Router::add('^/project$', ['controller' => 'ProjectController']);
Router::add('^/project/(?P<action>[a-z-]+)$', ['controller' => 'ProjectController']);

Router::add('^/report$', ['controller' => 'ReportController']);

Router::add('^$', ['controller' => 'SiteController']);

Router::dispatch($query);
