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
        $topHistory = Histories::find()->where(['is_active' => 1])->orderBy(['create_date' => SORT_DESC])->one();

        if ($topHistory === null) {
            throw new NotFoundHttpException();
        }

        $query = Histories::find()->where(['is_active' => 1])->andWhere(['<>', 'id', $topHistory->id]);

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

        return $this->render('index', ['histories' => $histories, 'pagination' => $pagination, 'topHistory' => $topHistory]);
    }

    public function actionView($id)
    {
        $history = Histories::find()->where(['is_active' => 1, 'id' => $id])->one();

        if ($history === null) {
            throw new NotFoundHttpException();
        }

        $otherHistories = Histories::find()->where(['is_active' => 1])->andWhere(['<>', 'id', $this->id])
            ->orderBy('RAND()')->limit(4)->all();

        return $this->render('view', ['history' => $history, 'otherHistories' => $otherHistories]);
    }
}