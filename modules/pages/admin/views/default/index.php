<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pages\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('pages', 'Статьи');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">
    <div class="page-heading">
        <h1><i class="icon-newspaper"></i><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a(Yii::t('pages', '<i class="icon-list-add"></i> Создать статью', [
            'modelClass' => 'Pages',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin(['id' => 'pjaxgrid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-bordered'],
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'class' => \yii\grid\ActionColumn::class,
            ],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
