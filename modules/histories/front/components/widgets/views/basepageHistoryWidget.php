<?php
/**
 * @var \app\modules\histories\models\Histories $history
*/
?>

<div class="story-container">
    <div class="story-block" style="background: url(<?=$history->getThumbUploadUrl('image', 'inside')?>) top no-repeat!important;">
        <h2><?=\Yii::t('front', 'Живые истории')?></h2>
        <div class="story-text">
            <p><?=$history->short_text?></p>
            <a href="<?=\yii\helpers\Url::to(['/histories/default/view', 'sefname' => $history->sefname])?>"
               class="btn btn--yellow"><?=\Yii::t('front', 'Читать всю историю')?></a>
        </div>
        <div class="story-author">
            <?=\yii\helpers\Html::img($history->getThumbUploadUrl('user_image', 'small'), ['class' => 'story-author--image'])?>
            <span class="story-author--name"><?=$history->user_fio?></span>
        </div>
    </div>
</div>
