<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\modules\galleries\models\Galleries */
/* @var $form yii\widgets\ActiveForm */


?>


<?php $form = ActiveForm::begin(
    [
        'enableClientValidation' => ($model->isNewRecord) ? true : false,
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'sefname')->textInput() ?>

<?= $form->field($model, 'is_active')->checkbox() ?>

<?=
$form->field($model, 'files[]')->widget(\kartik\file\FileInput::className(), [
    'options' => [
        'accept' => 'image/*',
        'multiple' => true,
    ],
    'pluginOptions' => [
        'maxFileCount' => 5,
        'showRemove' => false,
        'showUpload' => false,
        'deleteUrl' => \yii\helpers\Url::to(['/admin/image/default/delete-image']),
        'initialPreview' => $model->getListImageItems('images'),
        'initialPreviewAsData' => true,
        'overwriteInitial' => false,
        'initialPreviewConfig' => $model->getListImageItems('data'),
        'previewThumbTags' => [
            '{TAG_CSS_INIT}' => 'kv-hidden'
        ],
        'initialPreviewThumbTags' => $model->getListImageItems('description'),
        'layoutTemplates' => [
            'footer' => '<div class="file-thumbnail-footer">'
                . '<div class="file-footer-caption" title="{caption}">'
                . '<div class="file-caption-info">{caption}</div>'
                . '<div class="file-size-info">{size}</div>'
                . '<input id="{id}" class="kv-input kv-init form-control input-sm form-control-sm text-center {TAG_CSS_INIT}" value="{description}" placeholder="Enter caption...">'
                . '</div>'
                . '{progress}{indicator}{actions}'
                . '</div>'
        ],
        'browseOnZoneClick' => true,
    ],
    'pluginEvents' => [
        'filesorted' => new \yii\web\JsExpression('function(event, params){
                    $.post("' . \yii\helpers\Url::to(["/admin/image/default/sort-image", "modelId" => $model->id, "className" => $model->className()]) . '",{sort_order: params});
                }')
    ],
])
?>

<div class="form-group">
    <?= Html::submitButton(
        $model->isNewRecord ? Yii::t('admin', 'Создать') : Yii::t('admin', 'Сохранить'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    ) ?>
</div>

<?php ActiveForm::end(); ?>


