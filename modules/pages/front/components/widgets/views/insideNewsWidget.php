<?php
/**
 * @var \app\modules\pages\models\Pages[] $news
*/
?>
<div class="inner-news-slider">
    <h3><?=\Yii::t('front', 'Другие новости')?></h3>
    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php foreach($news as $item) : ?>
                <div class="swiper-slide news-item">
                    <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $item->id])?>">
                        <?=\yii\helpers\Html::img($item->getThumbUploadUrl('image', 'news_sidebar'))?>
                    </a>
                    <div class="news-title">
                        <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $item->id])?>">
                            <?=$item->title?>
                        </a>
                    </div>
                    <div class="news-text"><?=$item->short_text?></div>
                    <div class="news-date"><?=\Yii::$app->formatter->asDate($item->create_date, 'php:d.m.Y')?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>
