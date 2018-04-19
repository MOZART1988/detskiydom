<?php
/**
 * @var \app\modules\pages\models\Pages[] $news
 * @var \yii\data\Pagination $pagination
*/
?>
<div class="container">
    <div class="flex-container">
        <section class="center-block">
            <h1 class="yellow-title"><?=\Yii::t('front', 'Пресс-центр')?></h1>
            <div class="news-list">
                <?php foreach ($news as $item) : ?>
                    <div class="news-item">
                        <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $item->id])?>">
                            <?=\yii\helpers\Html::img(\app\components\behaviors\PreviewBehaviour::getImageUrl(
                                'pages', $item->image, $item->id, '_261x182_'))?>
                        </a>
                        <div class="news-title">
                            <a href="<?=\yii\helpers\Url::to(['/pages/default/news-view', 'id' => $item->id])?>">
                                <?=$item->title?>
                            </a>
                        </div>
                        <div class="news-text"><?=$item->short_text?></div>
                        <div class="news-date"><?=\Yii::$app->formatter->asDate($item->create_date, 'php:d.m.Y')?></div>
                    </div>
                <?php endforeach ; ?>
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
            <?=\app\modules\pages\front\components\widgets\SidebarNewsWidget::widget(['isProgramm' => true])?>
            <?=\app\modules\pages\front\components\widgets\ContactFormSidebarWidget::widget()?>
        </aside>
    </div>
</div>
