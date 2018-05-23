<?php
/**
 * @var \app\modules\histories\models\Histories $history
*/
?>

<div class="story-container">
    <div class="story-block">
        <h2><?=\Yii::t('front', 'Живые истории')?></h2>
        <div class="story-text">
            <p><?=\Yii::t('front', 'В этом разделе мы публикуем истории появления детей с синдромом Дауна. В них мамы делятся своими переживаниями, этапами принятия «особенности» своих детей, их успехами. Если вы тоже хотите поделиться своей историей, пишите нам')?></p>
            <a href="<?=\yii\helpers\Url::to('/contact/')?>"
               class="btn btn--yellow"><?=\Yii::t('front', 'Пишите нам')?></a>
        </div>
    </div>
</div>
