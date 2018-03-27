<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model \app\modules\content\models\Content */

$this->title = Yii::t('users', 'Создание текстовой страницы', [
    'modelClass' => 'Слайды',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Текстовые страницы'), 'url' => ['index']];
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
