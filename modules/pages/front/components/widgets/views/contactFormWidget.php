<?php
/**
 * @var \app\modules\pages\front\forms\ContactForm $model
*/
use yii\widgets\ActiveForm;
?>
<div class="feedback-form">
    <h3 class="form-title yellow-title"> <?=\Yii::t('front', 'есть предложения?')?> </h3>
    <p><?=\Yii::t('front', 'пишите!')?></p>
    <?php $form = ActiveForm::begin(['id' => 'sidebar-contact-widget', 'action' => \yii\helpers\Url::to(['/pages/default/send-form/'])]); ?>
    <?= $form->field($model, 'name')->textInput(['placeholder' => \Yii::t('front', 'Имя')])->label(false) ?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => \Yii::t('front', 'Электронная почта')])->label(false) ?>
    <?= $form->field($model, 'phone')->textInput(['placeholder' => \Yii::t('front', 'Контактный телефон')])->label(false) ?>
    <?= $form->field($model, 'message')->textarea([
        'placeholder' => \Yii::t('front', 'Ваши предложения'),
        'rows' => 7
    ])->label(false) ?>
    <button type="submit" class="btn btn--form">ОТПРАВИТЬ</button>
    <?php ActiveForm::end(); ?>
</div>
