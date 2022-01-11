<?php

namespace controllers;

use app\Controller;
use models\Department;

class DepartmentController extends Controller
{
    public function actionIndex(): void
    {
        $departments = Department::findAll();

        $this->view->render('department/index', compact('departments'));
    }

    public function actionCreate()
    {
        $department = new Department();

        if ($this->isPost() && $department->load($_POST)) {
            $department->save();
            $this->redirect('/department');
        }

        $this->view->render('department/create', compact('department'));
    }

    public function actionUpdate()
    {
        $departmentId = $_GET['id'] ?? null;

        $department = Department::findById($departmentId);

        if ($this->isPost() && $department->load($_POST)) {
            $department->save();
            $this->redirect('/department');
        }

        $this->view->render('department/update', compact('department'));
    }

    public function actionDelete()
    {
        $departmentId = $_GET['id'] ?? null;

        $department = Department::findById($departmentId);
        $department->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
