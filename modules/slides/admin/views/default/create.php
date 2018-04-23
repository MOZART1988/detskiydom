<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model \app\modules\slides\models\Slides */

$this->title = Yii::t('admin', 'Создание слайда', [
    'modelClass' => 'Слайды',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Слайды'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galleries-create">
    <div class="page-heading">
        <h1> <?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
