<?php
/**
 * @var \app\modules\pages\models\Pages[] $news
*/
?>
<aside class="right-block">
    <h3 class="yellow-title"><?=\Yii::t('front', 'Новости и события')?></h3>
    <div class="side-slider">
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php foreach ($news as $item) : ?>
                    <div class="swiper-slide news-item">
                        <a href="<?=\yii\helpers\Url::to(['/pages/default/view', 'sefname' => $item->sefname])?>">
                            <?=\yii\helpers\Html::img($item->getThumbUploadUrl('image', 'news_sidebar'))?>
                        </a>
                        <div class="news-title">
                            <a href="<?=\yii\helpers\Url::to(['/pages/default/view', 'sefname' => $item->sefname])?>">
                                <?=$item->title?>
                            </a>
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
</aside>
