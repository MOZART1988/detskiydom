<?php
/**
 * @var \app\modules\histories\models\Histories $history
 * @var \app\modules\histories\models\Histories[] $otherHistories
 */
?>

<div class="container">
    <div class="flex-container">
        <section class="center-block">
            <h1 class="yellow-title"><?=$history->title?></h1>
            <div class="content">
                <?=$history->text?>
            </div>
            <div class="sharing-block">
                <span>Поделитесь этой историей с друзьями</span>
                <div class="social-likes">
                    <a href="" class="vkontakte" title="Поделиться ссылкой во Вконтакте">
                        <img src="images/vk.jpg" alt=""> </a>
                    <a href="" class="facebook" title="Поделиться ссылкой на Фейсбуке">
                        <img src="images/fb.jpg" alt=""> </a>
                </div>
            </div>
            <?php if (!empty($otherHistories)) : ?>
                <div class="story-slider">
                    <h3><?=\Yii::t('front', 'Другие истории')?></h3>
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <?php foreach ($otherHistories as $item) : ?>
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide news-item">
                                    <a href="<?=\yii\helpers\Url::to(['/histories/default/view', 'id' => $item->id])?>">
                                        <?=\yii\helpers\Html::img($item->getThumbUploadUrl('image', 'list'))?>
                                    </a>
                                    <div class="news-title">
                                        <a href="<?=\yii\helpers\Url::to(['/histories/default/view', 'id' => $item->id])?>">
                                            <?=$item->title?>
                                        </a>
                                    </div>
                                    <div class="news-text"><?=$item->short_text?></div>
                                    <div class="news-author">
                                        <?=\yii\helpers\Html::img($item->getThumbUploadUrl('user_image', 'small'))?>
                                        <span><?=$item->user_fio?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ; ?>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <?php endif; ?>

        </section>
        <aside class="right-block">
            <div class="feedback-form">
                <h3 class="form-title yellow-title"> есть предложения? </h3>
                <p>пишите!</p>
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Имя"> </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Электронная почта"> </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Контактный телефон"> </div>
                    <div class="form-group">
                        <textarea name="" class="form-control" id="" rows="7" placeholder="Ваши предложения"></textarea>
                    </div>
                    <button type="submit" class="btn btn--form">ОТПРАВИТЬ</button>
                </form>
            </div>
            <h3 class="yellow-title">Программы фонда</h3>
            <div class="side-slider">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide news-item">
                            <a href="">
                                <img src="images/news1.jpg" alt=""> </a>
                            <div class="news-title">
                                <a href="">Ребенок должен жить в семье</a>
                            </div>
                            <div class="news-text">Рождение ребенка с синдромом Дауна зачастую оказывается большой неожиданностью для родителей. Что делать? Как жить дальше? Кто виноват?</div>
                            <div class="news-date">21.02.2018</div>
                        </div>
                        <div class="swiper-slide news-item">
                            <a href="">
                                <img src="images/news1.jpg" alt=""> </a>
                            <div class="news-title">
                                <a href="">Ребенок должен жить в семье</a>
                            </div>
                            <div class="news-text">Рождение ребенка с синдромом Дауна зачастую оказывается большой неожиданностью для родителей. Что делать? Как жить дальше? Кто виноват?</div>
                        </div>
                        <div class="swiper-slide news-item">
                            <a href="">
                                <img src="images/news1.jpg" alt=""> </a>
                            <div class="news-title">
                                <a href="">Ребенок должен жить в семье</a>
                            </div>
                            <div class="news-text">Рождение ребенка с синдромом Дауна зачастую оказывается большой неожиданностью для родителей. Что делать? Как жить дальше? Кто виноват?</div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                <a href="" class="btn btn--orangeSmall">Все новости</a>
            </div>
        </aside>
    </div>
</div>
