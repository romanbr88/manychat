<?php

namespace controllers;

use app\Controller;
use app\Db;

class ReportController extends Controller
{
    public function actionIndex()
    {
        $db = new Db();
        $sql = 'SELECT SUM(employee.salary) AS budget, project.id AS id, project.name AS name 
FROM project
    LEFT JOIN project_employee ON (project.id = project_employee.project_id) 
    LEFT JOIN employee ON (project_employee.employee_id = employee.id) 
GROUP BY project.id, project.name 
ORDER BY budget ASC';
        $reports = $db->queryToArray($sql);

        $this->view->render('report/index', compact('reports'));
    }
}
