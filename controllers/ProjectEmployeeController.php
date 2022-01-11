<?php

namespace controllers;

use app\Controller;
use models\Employee;
use models\Project;
use models\ProjectEmployee;

class ProjectEmployeeController extends Controller
{
    public function actionListProjects()
    {
        $employeeId = $_GET['id'] ?? null;

        $employee = Employee::findById($employeeId);
        $projects = $employee->getProjects();

        $this->view->render('employee/project/index', compact('projects', 'employee'));
    }

    public function actionListEmployees()
    {
        $projectId = $_GET['id'] ?? null;

        $project = Project::findById($projectId);
        $employees = $project->getEmployees();

        $this->view->render('project/employee/index', compact('project', 'employees'));
    }

    public function actionAddProjectToEmployee()
    {
        $employeeId = $_GET['employee_id'] ?? null;

        $employee = Employee::findById($employeeId);
        $projectEmployee = new ProjectEmployee();

        $projects = ProjectEmployee::getProjectWithoutEmployee($employeeId);

        if ($this->isPost() && $projectEmployee->load($_POST)) {
            $projectEmployee->save();
            $this->redirect('/employee/project?id=' . $employeeId);
        }

        $this->view->render('employee/project/add', compact('projectEmployee', 'employee', 'projects'));
    }

    public function actionAddEmployeeToProject()
    {
        $projectId = $_GET['project_id'] ?? null;

        $project = Project::findById($projectId);
        $projectEmployee = new ProjectEmployee();

        $employees = ProjectEmployee::getEmployeeWithoutProject($projectId);

        if ($this->isPost() && $projectEmployee->load($_POST)) {
            $projectEmployee->save();
            $this->redirect('/project/employee?id=' . $projectId);
        }

        $this->view->render('project/employee/add', compact('projectEmployee', 'project', 'employees'));
    }

    public function actionDelete()
    {
        $employeeId = $_GET['employee_id'] ?? null;
        $projectId = $_GET['project_id'] ?? null;

        $projectEmployee = ProjectEmployee::findByEmployeeIdAndProjectId($employeeId, $projectId);
        $projectEmployee->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}