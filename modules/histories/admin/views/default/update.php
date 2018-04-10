<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\histories\models\Histories */

$this->title = Yii::t('admin', 'Изменение истории: ', [
        'modelClass' => 'Галереи',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Истории'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Изменение');
?>
<div class="users-update">

    <div class="page-heading">

        <h1><i class="icon-user"></i> <?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
