<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 11.04.18
 * Time: 1:59 PM
 */

namespace app\modules\pages\front\controllers;


use app\modules\pages\front\forms\ContactForm;
use app\modules\pages\models\Pages;
use mtemplate\mcontrollers\MBTController;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class DefaultController extends MBTController
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function actionNews()
    {
        $query = Pages::find()->where(['is_active' => 1, 'type_id' => Pages::TYPE_NEWS]);

        $countQuery = clone $query;
        $count = $countQuery->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 8]);

        $news = $query
            ->limit($pagination->limit)
            ->offset($pagination->offset)
            ->orderBy(['create_date' => SORT_DESC])
            ->all();

        if (!$news) {
            throw new NotFoundHttpException();
        }

        $this->setMeta('�������');

        return $this->render('news', ['news' => $news, 'pagination' => $pagination]);
    }

    public function actionNewsView($id)
    {

        $model = Pages::find()->where(['is_active' => 1, 'id' => $id])->one();

        if ($model === null) {
            throw new NotFoundHttpException();
        }

        $this->setMeta($model->title);

        return $this->render('news-view', ['model' => $model]);
    }

    public function actionProgramms()
    {
        $query = Pages::find()->where(['is_active' => 1, 'type_id' => Pages::TYPE_PROGRAMM]);

        $countQuery = clone $query;
        $count = $countQuery->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 7]);

        $programms = $query
            ->limit($pagination->limit)
            ->offset($pagination->offset)
            ->orderBy(['create_date' => SORT_DESC])
            ->all();

        if (!$programms) {
            throw new NotFoundHttpException();
        }

        $this->setMeta(\Yii::t('front', '���������'));

        return $this->render('programms', ['programms' => $programms, 'pagination' => $pagination]);
    }

    public function actionInfo()
    {

        $query = Pages::find()->where(['is_active' => 1, 'type_id' => Pages::TYPE_FAQ]);

        $countQuery = clone $query;
        $count = $countQuery->count();

        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 7]);

        $info = $query
            ->limit($pagination->limit)
            ->offset($pagination->offset)
            ->orderBy(['create_date' => SORT_DESC])
            ->all();

        if (!$info) {
            throw new NotFoundHttpException();
        }

        $this->setMeta(\Yii::t('front', '�������� ����������'));

        return $this->render('info', ['info' => $info, 'pagination' => $pagination]);
    }

    public function actionInfoView($id)
    {

        $model = Pages::find()->where(['is_active' => 1, 'id' => $id])->one();

        if ($model === null) {
            throw new NotFoundHttpException();
        }

        $otherModels = Pages::find()->where(['is_active' => 1, 'type_id' => Pages::TYPE_FAQ])->andWhere(['<>', 'id', $model->id])->all();

        $this->setMeta($model->title);

        return $this->render('info-view', ['otherModels' => $otherModels, 'model' => $model]);
    }

    public function actionSendForm()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new ContactForm();

        if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post()) && $model->sendMessage()) {

            return ['success' => true];
        }

        return ['success' => false];
    }
}