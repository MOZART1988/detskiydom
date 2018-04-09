<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model \app\modules\galleries\models\Galleries */

$this->title = Yii::t('admin', 'Создание Галереи', [
    'modelClass' => 'Galleries',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Galleries'), 'url' => ['index']];
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
