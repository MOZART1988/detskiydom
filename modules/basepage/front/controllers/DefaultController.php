<?php

namespace app\modules\basepage\front\controllers;

use app\modules\custom_variables\models\CustomVariables;
use mtemplate\mcontrollers\MBTController;
use yii\web\NotFoundHttpException;

class DefaultController extends MBTController
{

    public function actionIndex()
    {
        $this->setMeta(\Yii::t('front', '�������'));
        return $this->render('index');
    }

    public function actionError()
    {
        $this->setMeta(\Yii::t('front', '�������� �� �������'));
        return $this->render('error');
    }
}
