<?php

namespace app\modules\basepage\front\controllers;

use app\modules\custom_variables\models\CustomVariables;
use mtemplate\mcontrollers\MBTController;
use yii\web\NotFoundHttpException;

class DefaultController extends MBTController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionError()
    {
        return $this->render('error');
    }
}
