<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 12.04.18
 * Time: 2:33 PM
 */

namespace app\modules\histories\front\controllers;


use app\modules\histories\models\Histories;
use app\modules\pages\front\forms\ContactForm;
use mtemplate\mcontrollers\MBTController;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DefaultController extends MBTController
{
    public function actionIndex()
    {
        $model = new ContactForm();

        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post()) && $model->sendMessage()) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['success' => true];
        }

        $query = Histories::find()->where(['is_active' => 1]);

        $countQuery = clone $query;
        $count = $countQuery->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 4]);

        $histories = $query
            ->limit($pagination->limit)
            ->offset($pagination->offset)
            ->orderBy(['create_date' => SORT_DESC])
            ->all();

        if (!$histories) {
            throw new NotFoundHttpException();
        }

        return $this->render('index', ['histories' => $histories, 'pagination' => $pagination]);
    }
}