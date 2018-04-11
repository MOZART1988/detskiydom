<?php
/**
 * @var \app\modules\pages\models\Pages[] $news
*/
?>

<div class="news-container">
    <h2 class="yellow-title"><?=\Yii::t('front', 'Новости фонда')?></h2>
    <div class="news-slider">
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach ($news as $item) : ?>
                    <div class="swiper-slide news-item">
                        <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $item->id])?>">
                            <?=\yii\helpers\Html::img($item->getThumbUploadUrl('image', 'news_thumb'))?>
                        </a>
                        <div class="news-title">
                            <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $item->id])?>"><?=$item->title?></a>
                        </div>
                        <div class="news-text"><?=$item->short_text?></div>
                        <div class="news-date"><?=\Yii::$app->formatter->asDate($item->create_date, 'php:d.m.Y')?></div>
                    </div>
                <?php endforeach ; ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
