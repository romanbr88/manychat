<?php

namespace app\controllers;

use app\models\DepartmentQuery;
use app\models\Employee;
use app\models\EmployeeQuery;
use app\models\forms\EmployeeForm;
use app\models\forms\ProjectEmployeeForm;
use app\models\ProjectEmployee;
use app\models\ProjectEmployeeQuery;
use app\models\ProjectQuery;
use Exception;
use PDO;
use Propel\Runtime\Exception\PropelException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class EmployeeController extends BaseController
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function actionIndex(): void
    {
        $employees = EmployeeQuery::create()->find();

        echo $this->view->render('employee/index.twig', compact('employees'));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @throws Exception
     */
    public function actionCreate()
    {
        $employee = new Employee();
        $form = new EmployeeForm($employee);
        $departments = DepartmentQuery::create()->find();
        $projects = ProjectQuery::create()->find();

        if ($this->isPost() && $form->save($_POST)) {
            $this->redirect('/employee');
        }

        echo $this->view->render('employee/create.twig', compact('form', 'departments', 'projects'));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @throws Exception
     */
    public function actionUpdate(int $id)
    {
        $employee = EmployeeQuery::create()->findOneById($id);
        $form = new EmployeeForm($employee);
        $departments = DepartmentQuery::create()->find();
        $projects = ProjectQuery::create()->find();

        if ($this->isPost() && $form->save($_POST)) {
            $this->redirect('/employee');
        }

        echo $this->view->render('employee/update.twig', compact('form', 'departments', 'projects'));
    }

    /**
     * @throws PropelException
     */
    public function actionDelete(int $id)
    {
        EmployeeQuery::create()->filterById($id)->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function actionListProject(int $id)
    {
        $projects = ProjectQuery::create()
            ->leftJoinProjectEmployee()
            ->where('project_employee.employee_id = ?', $id, PDO::PARAM_INT)
            ->find();
        $employee = EmployeeQuery::create()->findOneById($id);

        echo $this->view->render('employee/project/index.twig', compact('projects', 'employee'));
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     * @throws Exception
     */
    public function actionAddProject(int $id)
    {
        $projectEmployee = new ProjectEmployee();
        $form = new ProjectEmployeeForm($projectEmployee);
        $employee = EmployeeQuery::create()->findOneById($id);

        $employeeProjectIds = ProjectEmployeeQuery::create()
            ->select('project_id')
            ->filterByEmployeeId($id)
            ->find();
        $projects = ProjectQuery::create()
            ->where('project.id not in ?', $employeeProjectIds)
            ->orderByName()
            ->find();

        if ($this->isPost() && $form->save($_POST)) {
            $this->redirect('/employee/' . $id . '/project');
        }

        echo $this->view->render('employee/project/add.twig', compact('form', 'employee', 'projects'));
    }

    /**
     * @throws PropelException
     */
    public function actionDeleteProject(int $id, int $projectId)
    {
        ProjectEmployeeQuery::create()
            ->filterByEmployeeId($id)
            ->filterByProjectId($projectId)
            ->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
