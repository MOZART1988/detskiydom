<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model \app\modules\sliders\models\Sliders */

$this->title = Yii::t('users', 'Создание Слайда', [
    'modelClass' => 'Слайды',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Слайды'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">
    <div class="page-heading">
        <h1> <?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
