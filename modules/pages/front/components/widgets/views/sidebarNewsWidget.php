<?php
/**
 * @var \app\modules\pages\models\Pages[] $news
 * @var boolean $isProgramm
*/
?>
<h3 class="<?=$isProgramm ? 'yellow' : 'orange'?>-title"><?=$isProgramm ? \Yii::t('front', 'Программы фонда') : \Yii::t('front', 'Новости и события')?></h3>
<div class="side-slider">
    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php foreach ($news as $item) : ?>
                <div class="swiper-slide news-item">
                    <?php if ($isProgramm) : ?>
                        <a href="<?=\yii\helpers\Url::to(['/pages/default/programm-view', 'id' => $item->id])?>">
                            <?=\yii\helpers\Html::img(
                                    \app\components\behaviors\PreviewBehaviour::getImageUrl(
                                            'pages', $item->image, $item->id, '_310x216_'))?>
                        </a>
                    <?php else : ?>
                        <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $item->id])?>">
                            <?=\yii\helpers\Html::img(
                                \app\components\behaviors\PreviewBehaviour::getImageUrl(
                                    'pages', $item->image, $item->id, '_310x216_'))?>
                        </a>
                    <?php endif; ?>
                    <div class="news-title">
                        <?php if ($isProgramm) : ?>
                            <a href="<?=\yii\helpers\Url::to(['/pages/default/programm-view', 'id' => $item->id])?>">
                                <?=$item->title?>
                            </a>
                        <?php else : ?>
                            <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $item->id])?>">
                                <?=$item->title?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="news-text"><?=$item->short_text?></div>
                    <div class="news-date"><?=\Yii::$app->formatter->asDate($item->pub_date, 'php:d.m.Y')?></div>
                </div>
            <?php endforeach ; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <?php if ($isProgramm) : ?>
        <a href="<?=\yii\helpers\Url::to(['/pages/default/programms'])?>" class="btn btn--orangeSmall"><?=\Yii::t('front', 'Все программы')?></a>
    <?php else : ?>
        <a href="<?=\yii\helpers\Url::to(['/pages/default/news'])?>" class="btn btn--orangeSmall"><?=\Yii::t('front', 'Все новости')?></a>
    <?php endif; ?>
</div>

