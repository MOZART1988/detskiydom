<?php
/**
 * @var \app\modules\histories\models\Histories $history
*/
?>

<div class="story-container">
    <div class="story-block">
        <h2><?=\Yii::t('front', 'Живые истории')?></h2>
        <div class="story-text">
            <p><?=$history->short_text?></p>
            <a href="<?=\yii\helpers\Url::to(['/histories/default/view', 'id' => $history->id])?>"
               class="btn btn--yellow"><?=\Yii::t('front', 'Читать всю историю')?></a>
        </div>
        <div class="story-author">
            <?=\yii\helpers\Html::img(\app\components\behaviors\PreviewBehaviour::getImageUrl(
                'histories', $history->user_image, $history->id, '_50x50_'), ['style' => 'border-radius: 50px!important;'])?>
            <span class="story-author--name"><?=$history->user_fio?></span>
        </div>
    </div>
</div>
