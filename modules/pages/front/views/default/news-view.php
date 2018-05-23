<?php
/**
 * @var \app\modules\pages\models\Pages $model
*/
?>
<div class="container">
    <div class="flex-container">
        <section class="center-block">
            <h1 class="yellow-title"><?=$model->title?></h1>
            <div class="content">
                <?=\yii\helpers\Html::img(\app\components\behaviors\PreviewBehaviour::getImageUrl(
                    'pages', $model->image, $model->id, '_398x277_'), ['class' => 'content-image'])?>
                <?=$model->text?>
            </div>
            <div class="news-date"><?=\Yii::$app->formatter->asDate($model->pub_date, 'php:d.m.Y')?></div>
            <?php if ($model->next !== null) : ?>
            <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $model->next->id])?>" class="next-link"> <?=\Yii::t('front', 'читать следующую новость')?>
                <img src="/images/next-arr.png" alt="">
            </a>
            <?php endif; ?>
            <?=\app\modules\pages\front\components\widgets\InsideNewsWidget::widget(['id' => $model->id])?>
        </section>
        <aside class="right-block">
            <?=\app\modules\pages\front\components\widgets\SidebarNewsWidget::widget(['isProgramm' => true])?>
            <?=\app\modules\pages\front\components\widgets\ContactFormSidebarWidget::widget()?>
        </aside>
    </div>
</div>
