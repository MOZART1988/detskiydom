<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\modules\pages\models\Poll */
/* @var $form yii\widgets\ActiveForm */


?>


<?php $form = ActiveForm::begin(
    [
        'enableClientValidation' => ($model->isNewRecord) ? true : false,
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

<?= $form->field($model, 'answer')->textInput(['maxlength' => 255]) ?>

<div class="form-group">
    <?= Html::submitButton(
        $model->isNewRecord ? Yii::t('admin', 'Создать') : Yii::t('admin', 'Сохранить'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    ) ?>
</div>

<?php ActiveForm::end(); ?>


