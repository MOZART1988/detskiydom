<?php
/**
 * @var \app\modules\slides\models\Slides[] $slider
*/
?>
<div class="top-slider--container">
    <div class="container flex-container">
        <div class="top-slider">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($slider as $item) : ?>
                        <div class="swiper-slide">
                            <div class="top-slider--text">
                                <div class="slider-text">
                                    <h3 class="orange-title"><?=$item->title?></h3>
                                    <p><?=$item->text?></p>
                                </div>
                                <div class="read-more">
                                    <a href="<?='http://'  . $_SERVER['HTTP_HOST'] . $item->link?>">Читать все</a>
                                </div>
                            </div>
                            <div class="top-slider-wrapper">
                                <div class="top-slider--block">
                                    <?=\yii\helpers\Html::img(\app\components\behaviors\PreviewBehaviour::getImageUrl(
                                        'slides', $item->image, $item->id, '_660x450_'))?>
                                </div>
                                <img src="images/slider-bottom.png" alt="" class="slider-bottom">
                                <!-- If we need pagination -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>