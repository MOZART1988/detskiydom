<?php
/**
 * @var \app\modules\galleries\models\Galleries $gallery
 * @var \app\modules\videos\models\Videos[] $videoGallery
 */
?>
<div class="galery-container">
    <h2><?=\Yii::t('front', 'Наши дети')?></h2>
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?=\Yii::t('front', 'Фотографии')?></a>
            </li>
            <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?=\Yii::t('front', 'Видео')?></a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="galery-slider" id="galery-slider1">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php foreach ($gallery->images as $image) : ?>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item<?=mt_rand(1, 3)?>">
                                        <a data-fancybox="gallery" href="<?=$image->getImageUrl()?>" data-caption="<?=$image->description?>">
                                            <div class="galery-image" style="background-image: url(<?=$image->getImageUrl('_660x357_')?>);"></div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach ; ?>
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev">
                        <img src="/images/prev-btn.png" alt=""> </div>
                    <div class="swiper-button-next">
                        <img src="/images/next-btn.png" alt=""> </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="galery-slider" id="galery-slider2">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php foreach ($videoGallery as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item<?=mt_rand(1, 3)?>">
                                        <a href="<?=$item->youtube_video?>" data-fancybox="gallery">
                                            <div class="galery-image" style="background-image: url(<?=\app\components\behaviors\PreviewBehaviour::getImageUrl(
                                                    'videos', $item->image, $item->id, '_660x357_')?>);"></div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach ; ?>
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev">
                        <img src="/images/prev-btn.png" alt=""> </div>
                    <div class="swiper-button-next">
                        <img src="/images/next-btn.png" alt=""> </div>
                </div>
            </div>
        </div>
    </div>
</div>
