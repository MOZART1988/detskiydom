<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\slides\models\Slides */

$this->title = Yii::t('admin', 'Изменение Слайда: ', [
        'modelClass' => 'Галереи',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Слайды'), 'url' => ['index']];
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
