<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pages\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>
    <div class="row">
        <div class="col-md-9">

            <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'short_text')->textarea(['rows' => 4]); ?>

            <?= $form->field($model, 'text')->textarea(['rows' => 4]); ?>

            <?= $form->field($model, 'sefname')->textInput(['maxlength' => 255, 'disabled' => 'disabled']) ?>

            <?= $form->field($model, 'image')->fileInput() ?>

            <?php if (!empty($model->image)) : ?>
                <?= Html::img($model->getThumbUploadUrl('image', 'thumb'), ['class' => 'img-thumbnail']) ?>
            <?php endif; ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('pages', 'Создать') : Yii::t('pages',
                    'Изменить'), [
                    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
                ]) ?>
            </div>

        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
