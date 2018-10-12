<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pages\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('pages', 'Статьи');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('successCopy')): ?>
    <div class="alert alert-success alert-success">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <?= Yii::$app->session->getFlash('successCopy') ?>
    </div>
<?php endif; ?>
<div class="pages-index">
    <div class="page-heading">
        <h1><i class="icon-newspaper"></i><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a(Yii::t('pages', '<i class="icon-list-add"></i> Создать статью', [
            'modelClass' => 'Pages',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= \kartik\grid\GridView::widget([
        'tableOptions' => [
            'class' => 'table table-bordered',
        ],
        'bordered' => false,
        'striped' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterUrl' => \yii\helpers\Url::to(['/pages/default/index']),
        'layout' => '{items}',
        'columns' => [
            ['class' => \yii\grid\SerialColumn::class],
            'title',
            [
                'class' => \kartik\grid\EditableColumn::class,
                'attribute' => 'sort',
                'value' => function ($data) {
                    /**
                     * @var $data \app\modules\pages\models\Pages
                    */

                    return $data->sort;
                },
                'editableOptions' => function ($model, $key, $index) {
                    return [
                        'formOptions' => [
                            'action' => \yii\helpers\Url::to(['/pages/default/set-new-attribute/', 'id' => $model->id, 'attribute' => 'sort', 'value' => $key])
                        ],
                    ];
                },
            ],
            [
                'attribute' => 'type_id',
                'value' => function ($data) {
                    /**
                     * @var \app\modules\pages\models\Pages $data
                     */

                    return \app\modules\pages\models\Pages::$types[$data->type_id];
                },
                'filter' => \app\modules\pages\models\Pages::$types
            ],
            'actions' => [
                'class' => \yii\grid\ActionColumn::class,
                'template' => '{copy} {update} {delete}',
                'buttons' => [
                    'copy' => function ($url, $model) {
                        return \yii\helpers\Html::a('<span class="glyphicon glyphicon-repeat"></span>',
                            ['copy-to-another-lang', 'id' => $model->id], [
                                'title' => 'Скопировать элемент'
                            ]);
                    }
                ],
            ]
        ],
    ]) ?>

    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination
    ])?>

</div>
