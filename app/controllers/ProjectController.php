<?php

namespace app\controllers;

use app\models\EmployeeQuery;
use app\models\forms\ProjectEmployeeForm;
use app\models\forms\ProjectForm;
use app\models\Project;
use app\models\ProjectEmployee;
use app\models\ProjectEmployeeQuery;
use app\models\ProjectQuery;
use Exception;
use PDO;
use Propel\Runtime\Exception\PropelException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ProjectController extends BaseController
{
    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function actionIndex(): void
    {
        $projects = ProjectQuery::create()->find();

        echo $this->view->render('project/index.twig', compact('projects'));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @throws Exception
     */
    public function actionCreate()
    {
        $project = new Project();
        $form = new ProjectForm($project);

        if ($this->isPost() && $form->save($_POST)) {
            $this->redirect('/project');
        }

        echo $this->view->render('project/create.twig', compact('form'));
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     * @throws Exception
     */
    public function actionUpdate(int $id)
    {
        $project = ProjectQuery::create()->findOneById($id);
        $form = new ProjectForm($project);

        if ($this->isPost() && $form->save($_POST)) {
            $this->redirect('/project');
        }

        echo $this->view->render('project/update.twig', compact('form'));
    }

    /**
     * @throws PropelException
     */
    public function actionDelete(int $id)
    {
        ProjectQuery::create()->filterById($id)->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function actionListEmployee(int $id)
    {
        $employees = EmployeeQuery::create()
            ->leftJoinProjectEmployee()
            ->where('project_employee.project_id = ?', $id, PDO::PARAM_INT)
            ->find();
        $project = ProjectQuery::create()->findOneById($id);

        echo $this->view->render('project/employee/index.twig', compact('employees', 'project'));
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     * @throws Exception
     */
    public function actionAddEmployee(int $id)
    {
        $projectEmployee = new ProjectEmployee();
        $form = new ProjectEmployeeForm($projectEmployee);
        $project = ProjectQuery::create()->findOneById($id);

        $projectEmployeeIds = ProjectEmployeeQuery::create()
            ->select('employee_id')
            ->filterByProjectId($id)
            ->find();
        $employees = EmployeeQuery::create()
            ->where('employee.id not in ?', $projectEmployeeIds)
            ->orderByLastName()
            ->find();

        if ($this->isPost() && $form->save($_POST)) {
            $this->redirect('/project/' . $id . '/employee');
        }

        echo $this->view->render('project/employee/add.twig', compact('form', 'project', 'employees'));
    }

    /**
     * @throws PropelException
     */
    public function actionDeleteEmployee(int $id, int $employeeId)
    {
        ProjectEmployeeQuery::create()
            ->filterByEmployeeId($employeeId)
            ->filterByProjectId($id)
            ->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
