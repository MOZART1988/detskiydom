<?php
/**
 * @var \app\modules\histories\models\Histories[] $histories
 * @var \app\modules\histories\models\Histories $topHistory
 * @var \yii\data\Pagination $pagination
*/
?>

<div class="container">
    <div class="flex-container">
        <section class="center-block">
            <h1 class="yellow-title"><?=\Yii::t('front', 'Живые истории')?></h1>
            <div class="stories-list">
                <div class="top-story-item">
                    <a href="#">
                        <img src="/images/top-story.jpg">
                        <div class="top-story-text">
                            <div class="top-story-title"> <?=\Yii::t('front', 'Живые истории')?> </div>
                            <p> <?=\Yii::t('front', 'В этом разделе мы публикуем истории появления детей с синдромом Дауна. 
                            В них мамы делятся своими переживаниями, этапами принятия «особенности» своих детей, их успехами. 
                            Если вы тоже хотите поделиться своей историей, пишите нам на e-mail: kunbala.fund@gmail.com')?> </p>
                        </div>
                    </a>
                </div>
                <?php foreach ($histories as $item) : ?>
                    <div class="news-item">
                        <a href="<?=\yii\helpers\Url::to(['/histories/default/view', 'id' => $item->id])?>">
                            <?php if (!empty($item->image)) : ?>
                            <?=\yii\helpers\Html::img(
                                \app\components\behaviors\PreviewBehaviour::getImageUrl(
                                    'histories', $item->image, $item->id, '_436x304_'))?>
                            <?php else: ?>
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
                <?php endforeach; ?>
            </div>
            <nav class="page-navigation">
                <?=\yii\widgets\LinkPager::widget([
                    'pagination' => $pagination,
                    'options' => [
                        'class' => false,
                    ],
                    'prevPageLabel' => false,
                    'nextPageLabel' => false,
                ])?>
            </nav>
        </section>
        <aside class="right-block">
            <?=\app\modules\pages\front\components\widgets\ContactFormSidebarWidget::widget()?>
            <?=\app\modules\pages\front\components\widgets\SidebarNewsWidget::widget(['isProgramm' => true])?>
        </aside>
    </div>
</div>
