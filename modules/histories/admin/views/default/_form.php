<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\modules\histories\models\Histories */
/* @var $form yii\widgets\ActiveForm */


?>


<?php $form = ActiveForm::begin(
    [
        'enableClientValidation' => ($model->isNewRecord) ? true : false,
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'sefname')->textInput(['disabled' => true]) ?>

<?= $form->field($model, 'user_fio')->textInput()?>

<?= $form->field($model, 'short_text')->textarea()?>

<?= $form->field($model, 'text')->widget(\app\components\CustomCkeditor::class,[
    'preset' => 'standart',
    'options' => ['rows' => 6]
]);?>

<?= $form->field($model, 'is_active')->checkbox() ?>

<?= $form->field($model, 'image')->fileInput() ?>

<?php if (!empty($model->image)) : ?>
    <?= Html::img($model->getThumbUploadUrl('image', 'thumb'), ['class' => 'img-thumbnail']) ?>
<?php endif; ?>

<?= $form->field($model, 'user_image')->fileInput() ?>

<?php if (!empty($model->image)) : ?>
    <?= Html::img($model->getThumbUploadUrl('user_image', 'thumb'), ['class' => 'img-thumbnail']) ?>
<?php endif; ?>

<div class="form-group">
    <?= Html::submitButton(
        $model->isNewRecord ? Yii::t('admin', 'Создать') : Yii::t('admin', 'Сохранить'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    ) ?>
</div>

<?php ActiveForm::end(); ?>


