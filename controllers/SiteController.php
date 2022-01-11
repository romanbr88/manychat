<?php

namespace controllers;

use app\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->view->render('index');
    }
}
