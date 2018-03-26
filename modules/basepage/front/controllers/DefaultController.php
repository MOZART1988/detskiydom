<?php

namespace app\modules\basepage\front\controllers;

use app\modules\custom_variables\models\CustomVariables;
use mtemplate\mcontrollers\MBTController;
use yii\web\NotFoundHttpException;

class DefaultController extends MBTController
{

    public function actionIndex()
    {

        $variables = CustomVariables::find()->where(['is_active' => 1, 'module_name' => \Yii::$app->controller->module->id])->all();

        if (!$variables) {
            throw new NotFoundHttpException();
        }

        return $this->render('index', ['variables' => $variables]);
    }

    public function actionError()
    {
        return $this->render('error');
    }
}
