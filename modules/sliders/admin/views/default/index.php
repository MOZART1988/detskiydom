<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \app\modules\custom_variables\models\SlidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('users', 'Слайды');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <div class="page-heading">
        <h1><i class="icon-users"></i> <?= Html::encode($this->title) ?></h1>
    </div>
    <p>
        <?= Html::a(Yii::t('users', 'Добавить Слайд', [
            'modelClass' => 'Слайды',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'create_date',
            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>
</div>

