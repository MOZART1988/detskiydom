<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 27.04.18
 * Time: 5:07 PM
 */

namespace app\modules\poll\front\controllers;


use app\modules\poll\front\components\widgets\PollForm;
use mtemplate\mcontrollers\MBTController;
use yii\web\NotFoundHttpException;

class DefaultController extends MBTController
{
    public function actionSendPoll()
    {
        $model = new PollForm();

        if ($model->load(\Yii::$app->request->post()) && $model->increasePoll()) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
    }
}