<?php

namespace controllers;

use app\Controller;
use models\Department;
use models\Employee;
use models\Project;

class EmployeeController extends Controller
{
    public function actionIndex(): void
    {
        $employees = Employee::findAll();

        $this->view->render('employee/index', compact('employees'));
    }

    public function actionCreate()
    {
        $employee = new Employee();
        $departments = Department::findAll();
        $projects = Project::findAll();

        if ($this->isPost() && $employee->load($_POST)) {
            $employee->save();
            $this->redirect('/employee');
        }

        $this->view->render('employee/create', compact('employee', 'departments', 'projects'));
    }

    public function actionUpdate()
    {
        $employeeId = $_GET['id'] ?? null;

        $employee = Employee::findById($employeeId);
        $departments = Department::findAll();
        $projects = Project::findAll();

        if ($this->isPost() && $employee->load($_POST)) {
            $employee->save();
            $this->redirect('/employee');
        }

        $this->view->render('employee/update', compact('employee', 'departments', 'projects'));
    }

    public function actionDelete()
    {
        $employeeId = $_GET['id'] ?? null;

        $employee = Employee::findById($employeeId);
        $employee->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
