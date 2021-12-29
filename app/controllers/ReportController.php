<?php

namespace app\controllers;

use app\models\Map\EmployeeTableMap;
use app\models\Map\ProjectEmployeeTableMap;
use app\models\ProjectQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Exception\PropelException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ReportController extends BaseController
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @throws PropelException
     */
    public function actionIndex(): void
    {
        $reports = ProjectQuery::create()
            ->withColumn('SUM(employee.salary)', 'budget')
            ->select(['project.id' => 'id', 'project.name' => 'name', 'budget'])
            ->leftJoinProjectEmployee()
            ->addJoin(ProjectEmployeeTableMap::COL_EMPLOYEE_ID, EmployeeTableMap::COL_ID, Criteria::LEFT_JOIN)
            ->groupBy('project.id')
            ->orderBy('budget')
            ->find();

        echo $this->view->render('report/index.twig', compact('reports'));
    }
}
