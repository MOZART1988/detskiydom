<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 2:02 PM
 */

namespace app\modules\slides\admin\controllers;

use app\modules\languages\models\Languages;
use app\modules\slides\models\Slides;
use app\modules\slides\models\SlidesSearch;
use mtemplate\mcontrollers\MBTAController;
use yii\web\NotFoundHttpException;
use Yii;
use yii\web\Response;

class DefaultController extends MBTAController
{
    /**
     * Lists all Slides models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlidesSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    /**
     * Creates a new Slides model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slides();
        $model->setScenario('create');

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Slides model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('update');

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Slides model.
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
     * Finds the Histories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slides the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slides::findOne($id)) !== null) {
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

        $current = Slides::findOne($id);

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