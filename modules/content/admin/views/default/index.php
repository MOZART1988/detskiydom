<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \app\modules\content\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('users', 'Текстовые страницы');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('successCopy')): ?>
    <div class="alert alert-success alert-success">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <?= Yii::$app->session->getFlash('successCopy') ?>
    </div>
<?php endif; ?>
<div class="users-index">
    <div class="page-heading">
        <h1><i class="icon-users"></i> <?= Html::encode($this->title) ?></h1>
    </div>
    <p>
        <?= Html::a(Yii::t('users', 'Добавить текстовую страницу', [
            'modelClass' => 'Текстовые страницы',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => \yii\grid\SerialColumn::class],
            'title',
            'create_date',
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
    ]); ?>
</div>

