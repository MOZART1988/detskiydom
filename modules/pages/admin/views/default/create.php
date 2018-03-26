<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\pages\models\Pages */

$this->title = Yii::t('pages', 'Создание статьи');
$this->params['breadcrumbs'][] = ['label' => Yii::t('pages', 'Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-create">

    <div class="page-heading">
        <h1><i class="icon-newspaper"></i><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
