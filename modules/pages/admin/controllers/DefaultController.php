<?php

namespace app\modules\pages\admin\controllers;

use app\modules\languages\models\Languages;
use mtemplate\mcontrollers\MBTAController;
use Yii;
use app\modules\pages\models\Pages;
use app\modules\pages\models\PagesSearch;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * DefaultController implements the CRUD actions for Pages model.
 */
class DefaultController extends MBTAController
{
    protected $_modelName = Pages::class;

    /**
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new PagesSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', ['model' => $model]);
    }

    /**
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages;

        $model->setScenario('create');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pages model.
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
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pages model.
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
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSetNewAttribute($id, $attribute)
    {
        $model = Pages::findOne($id);

        if ($model === null) {
            return false;
        }

        if ($model->load(\Yii::$app->request->post())) {
            $postModel = \Yii::$app->request->post('Pages');
            $finalValue = null;

            foreach ($postModel as $key => $value) {

                $finalValue = $value[$attribute];
            }

            $model->$attribute = $finalValue;

            $model->save();
            return true;
        }

        return false;
    }

    /**
     * Copies element to another lang version
     * @param  integer $id
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionCopyToAnotherLang($id)
    {
        $current = Pages::find()->where(['id' => $id])->one();

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
