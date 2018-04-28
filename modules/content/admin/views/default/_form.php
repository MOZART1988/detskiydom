<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\modules\content\models\Content */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="users-form">
    <?php $form = ActiveForm::begin(
        [
            'enableClientValidation' => ($model->isNewRecord) ? true : false,
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'text')->widget(\app\components\CustomCkeditor::class,[
        'preset' => 'standart',
        'options' => ['rows' => 6]
    ]);?>

    <?= $form->field($model, 'sefname')->textInput(['maxlength' => 255, 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'quote')->textInput()?>

    <?= $form->field($model, 'goals')->textarea()?>

    <?php if (!empty($model->image)) : ?>
        <?= Html::img($model->getThumbUploadUrl('image', 'thumb'), ['class' => 'img-thumbnail']) ?>
    <?php endif; ?>

    <?= $form->field($model, 'is_active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('users', 'Создать') : Yii::t('users', 'Сохранить'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
