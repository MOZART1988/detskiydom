<?php
/**
 * Created by PhpStorm.
 * User: MOZART
 * Date: 19.09.2017
 * Time: 21:59
 */

namespace app\modules\content\admin\controllers;

use app\modules\content\models\Content;
use app\modules\content\models\ContentSearch;
use app\modules\languages\models\Languages;
use mtemplate\mcontrollers\MBTAController;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DefaultController extends MBTAController
{
    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Content();

        $model->setScenario('create');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->setScenario('update');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Copies element to another lang version
     * @param  integer $id
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionCopyToAnotherLang($id)
    {
        $current = Content::findOne($id);

        if ($current === null) {
            throw new NotFoundHttpException();
        }

        $langId = Languages::getAdminCurrent()->id;


        $languages = Languages::find()->where(['<>', 'id', $langId])->all();

        if (!$languages) {
            throw new NotFoundHttpException();
        }

        foreach($languages as $lang) {
            $current->copy($lang->id);
        }

        Yii::$app->session->setFlash('successCopy', 'Элемент скопирован в другую языковую версию');

        return $this->redirect(\Yii::$app->request->referrer);

    }
}