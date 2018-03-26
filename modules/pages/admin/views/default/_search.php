<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pages\models\PagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'pub_date') ?>
    <?php echo $form->field($model, 'pub_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('pages', 'Искать'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('pages', 'Сбросить'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
