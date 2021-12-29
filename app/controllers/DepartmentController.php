<?php

namespace app\controllers;

use app\models\Department;
use app\models\DepartmentQuery;
use app\models\forms\DepartmentForm;
use Exception;
use Propel\Runtime\Exception\PropelException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class DepartmentController extends BaseController
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function actionIndex(): void
    {
        $departments = DepartmentQuery::create()->find();

        echo $this->view->render('department/index.twig', compact('departments'));
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     * @throws Exception
     */
    public function actionCreate()
    {
        $department = new Department();
        $form = new DepartmentForm($department);

        if ($this->isPost() && $form->save($_POST)) {
            $this->redirect('/department');
        }

        echo $this->view->render('department/create.twig', compact('form'));
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     * @throws Exception
     */
    public function actionUpdate(int $id)
    {
        $department = DepartmentQuery::create()->findOneById($id);
        $form = new DepartmentForm($department);

        if ($this->isPost() && $form->save($_POST)) {
            $this->redirect('/department');
        }

        echo $this->view->render('department/update.twig', compact('form'));
    }

    /**
     * @throws PropelException
     */
    public function actionDelete(int $id)
    {
        DepartmentQuery::create()->filterById($id)->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
