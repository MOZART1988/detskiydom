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
                        <img src="/images/vk.jpg" alt=""> </a>
                    <a href="" class="facebook" title="Поделиться ссылкой на Фейсбуке">
                        <img src="/images/fb.jpg" alt=""> </a>
                </div>
            </div>
            <?php if (!empty($otherHistories)) : ?>
                <div class="story-slider">
                    <h3><?=\Yii::t('front', 'Другие истории')?></h3>
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($otherHistories as $item) : ?>
                                <!-- Additional required wrapper -->
                                <!-- Slides -->
                                <div class="swiper-slide news-item">
                                    <a href="<?=\yii\helpers\Url::to(['/histories/default/view', 'id' => $item->id])?>">
                                        <?php if (!empty($item->image)) : ?>
                                        <?=\yii\helpers\Html::img(
                                            \app\components\behaviors\PreviewBehaviour::getImageUrl(
                                                'histories', $item->image, $item->id, '_425x296_'))?>
                                        <?php else : ?>
                                            <img src="/images/no-photo.png">
                                        <?php endif; ?>
                                    </a>
                                    <div class="news-title">
                                        <a href="<?=\yii\helpers\Url::to(['/histories/default/view', 'id' => $item->id])?>">
                                            <?=$item->title?>
                                        </a>
                                    </div>
                                    <div class="news-text"><?=$item->short_text?></div>
                                </div>
                            <?php endforeach ; ?>
                            <!-- If we need pagination -->
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <?php endif; ?>

        </section>
        <aside class="right-block">
            <?=\app\modules\pages\front\components\widgets\ContactFormSidebarWidget::widget()?>
            <?=\app\modules\pages\front\components\widgets\SidebarNewsWidget::widget(['isProgramm' => true])?>
        </aside>
    </div>
</div>
