<?php

namespace controllers;

use app\Controller;
use models\Department;
use models\Employee;
use models\Project;

class ProjectController extends Controller
{
    public function actionIndex(): void
    {
        $projects = Project::findAll();

        $this->view->render('project/index', compact('projects'));
    }

    public function actionCreate()
    {
        $project = new Project();

        if ($this->isPost() && $project->load($_POST)) {
            $project->save();
            $this->redirect('/project');
        }

        $this->view->render('project/create', compact('project'));
    }

    public function actionUpdate()
    {
        $projectId = $_GET['id'] ?? null;

        $project = Project::findById($projectId);

        if ($this->isPost() && $project->load($_POST)) {
            $project->save();
            $this->redirect('/project');
        }

        $this->view->render('project/update', compact('project'));
    }

    public function actionDelete()
    {
        $projectId = $_GET['id'] ?? null;

        $project = Project::findById($projectId);
        $project->delete();

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
