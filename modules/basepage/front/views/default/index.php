<div class="container">
    <?=\app\modules\pages\front\components\widgets\BasepageNewsWidget::widget()?>
    <?=\app\modules\histories\front\components\widgets\BasepageHistoryWidget::widget()?>
    <div class="galery-container">
        <h2>Наши дети</h2>
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Фотографии</a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Видео</a>
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
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item1">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news1.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item2">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news2.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item3">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news2.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item1">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news1.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item2">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news2.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item3">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news2.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev">
                            <img src="images/prev-btn.png" alt=""> </div>
                        <div class="swiper-button-next">
                            <img src="images/next-btn.png" alt=""> </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="galery-slider" id="galery-slider2">
                        <!-- Slider main container -->
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item2">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news2.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item1">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news1.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item3">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news2.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item1">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news1.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item2">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news2.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="galery-item galery-item3">
                                        <a href="">
                                            <div class="galery-image" style="background-image: url(images/news2.jpg);"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev">
                            <img src="images/prev-btn.png" alt=""> </div>
                        <div class="swiper-button-next">
                            <img src="images/next-btn.png" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>