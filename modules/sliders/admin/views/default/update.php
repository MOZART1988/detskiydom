<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\modules\sliders\models\Sliders */

$this->title = Yii::t('users', 'Изменение Слайда: ', [
        'modelClass' => 'Переменные',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Слайды'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('users', 'Изменение');
?>
<div class="users-update">

    <div class="page-heading">

        <h1><i class="icon-user"></i> <?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
