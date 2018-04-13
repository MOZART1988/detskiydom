<?php
/**
 * @var \app\modules\pages\models\Pages[] $info
 * @var \yii\data\Pagination $pagination
*/
$counter = 1;
?>
<div class="container">
    <div class="flex-container">
        <section class="center-block">
            <h1 class="yellow-title"><?=\Yii::t('front', 'Полезная информация')?></h1>
            <div class="info-list">
                <?php foreach ($info as $item) : ?>
                    <div class="info-item">
                        <div class="info-item--number"><?=$counter++?>.</div>
                        <div class="info-title">
                            <a href="<?=\yii\helpers\Url::to(['/pages/default/info-view', 'id' => $item->id])?>">
                                <?=$item->title?>
                            </a>
                        </div>
                        <p><?=$item->short_text?></p>
                        <div class="news-date">
                            <?=\Yii::$app->formatter->asDate($item->create_date, 'php:d.m.Y')?>
                        </div>
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
