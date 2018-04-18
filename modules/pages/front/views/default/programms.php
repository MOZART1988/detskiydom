<?php
/**
 * @var \app\modules\pages\models\Pages[] $programms
 * @var \yii\data\Pagination $pagination
*/
?>
<div class="container">
    <div class="flex-container">
        <section class="center-block">
            <h1 class="yellow-title">программы фонда</h1>
            <div class="programms-list">
                <?php foreach ($programms as $programm) : ?>
                    <div class="programm-item <?=\app\modules\pages\models\Pages::$backgroundColors[mt_rand(0, 3)]?>">
                        <?=\yii\helpers\Html::img(\app\components\behaviors\PreviewBehaviour::getImageUrl(
                                'pages', $programm->image, $programm->id, '_398x277_'))?>
                        <div class="overlay">
                            <a href="<?=\yii\helpers\Url::to(['programm-view', 'id' => $programm->id])?>">
                                <span><?=$programm->title?></span>
                            </a>
                        </div>
                    </div>
                <?php endforeach ; ?>
            </div>
            <nav class="page-navigation">
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
            </nav>
        </section>
        <aside class="right-block">
            <?=\app\modules\pages\front\components\widgets\SidebarNewsWidget::widget(['isProgramm' => true])?>
            <?=\app\modules\pages\front\components\widgets\ContactFormSidebarWidget::widget()?>
        </aside>
    </div>
</div>
