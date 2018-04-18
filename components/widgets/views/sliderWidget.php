<?php
/**
 * @var \app\modules\galleries\models\Galleries $slider
*/
?>
<div class="top-slider--container">
    <div class="container flex-container">
        <div class="top-slider--text">
            <div class="slider-text">
                <h3 class="orange-title"><?= Yii::t('frontend', 'О фонде') ?></h3>
                    <p><?= Yii::t('frontend', 'Общественный фонд «Помощи детям и подросткам с синдромом Дауна КYН БАЛА» существует с 14 августа 2015 года. Фонд организован при участии семей, воспитывающих детей и подростков с синдромом Дауна (СД) и является на сегодняшний день первым
                        и единственным фондом на территории г. Алматы, представляющим интересы людей с СД. Наш фонд объединяет и представляет интересы более 100 семей на территории Алматы и Алматинской области, в которых живут и воспитываются «солнечные» дети.') ?></p>
            </div>
            <div class="read-more">
                <a href=""><?= Yii::t('frontend', 'читать все') ?></a>
            </div>
        </div>
        <div class="top-slider">
            <div class="top-slider--block">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php foreach ($slider->images as $image) : ?>
                            <div class="swiper-slide">
                                <img src="<?=$image->getImageUrl()?>" alt=""> </div>
                        <?php endforeach ; ?>
                    </div>
                </div>
                <img src="images/slider-bottom.png" alt="" class="slider-bottom">
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>