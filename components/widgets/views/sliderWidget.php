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
                                    <a href="<?=$_SERVER['HTTP_HOST'] . $item->link?>"></a>
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

                    <div class="swiper-slide">
                        <div class="top-slider--text">
                            <div class="slider-text">
                                <h3 class="orange-title">О фонде</h3>
                                <p>Общественный фонд «Помощи детям и подросткам с синдромом Дауна КYН БАЛА» существует с 14 августа 2015 года. Фонд организован при участии семей, воспитывающих детей и подростков с синдромом Дауна (СД) и является на сегодняшний день
                                    первым и единственным фондом на территории г. Алматы, представляющим интересы людей с СД. Наш фонд объединяет и представляет интересы более 100 семей на территории Алматы и Алматинской области, в которых живут и воспитываются «солнечные»
                                    дети.</p>
                            </div>
                            <div class="read-more">
                                <a href="">читать все</a>
                            </div>
                        </div>
                        <div class="top-slider-wrapper">
                            <div class="top-slider--block">
                                <img src="images/slide1.jpg" alt=""> </div>
                            <img src="images/slider-bottom.png" alt="" class="slider-bottom">
                            <!-- If we need pagination -->
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>