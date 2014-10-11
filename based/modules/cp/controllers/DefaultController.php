<?php

namespace app\modules\cp\controllers;

use \app\modules\cp\components\Controller;

class DefaultController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
