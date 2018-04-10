<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 4:17 PM
 */

namespace app\modules\content\front\controllers;


use app\modules\content\models\Content;
use mtemplate\mcontrollers\MBTController;
use yii\web\NotFoundHttpException;

class DefaultController extends MBTController
{
    public function actionView($id)
    {
        $content = Content::find()->where(['is_active' => 1, 'id' => $id])->one();

        if ($content === null) {
            throw new NotFoundHttpException();
        }

        $goals = !empty($content->goals) ? explode("\n", $content->goals) : [];

        return $this->render('view', ['content' => $content, 'goals' => $goals]);
    }
}