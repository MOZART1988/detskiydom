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
                    <a href="<?=\yii\helpers\Url::to(['/histories/default/view', 'id' => $topHistory->id])?>">
                        <?=\yii\helpers\Html::img($topHistory->getThumbUploadUrl('image', 'top'))?>
                        <div class="top-story-text">
                            <div class="top-story-title"> <?=$topHistory->title?> </div>
                            <p> <?=$topHistory->short_text?> </p>
                        </div>
                    </a>
                </div>
                <?php foreach ($histories as $item) : ?>
                    <div class="news-item">
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
                <?php endforeach; ?>
            </div>
            <nav class="page-navigation">
                <?=\yii\widgets\LinkPager::widget([
                    'pagination' => $pagination,
                    'options' => [
                        'class' => false,
                    ],
                    'prevPageLabel' => \Yii::t('front', 'предыдущее'),
                    'nextPageLabel' => \Yii::t('front', 'следующее'),
                    'prevPageCssClass' => 'prev-link',
                    'nextPageCssClass' => 'next-link'
                ])?>
            </nav>
        </section>
        <aside class="right-block">
            <?=\app\modules\pages\front\components\widgets\ContactFormSidebarWidget::widget()?>
            <?=\app\modules\pages\front\components\widgets\SidebarNewsWidget::widget(['isProgramm' => true])?>
        </aside>
    </div>
</div>
