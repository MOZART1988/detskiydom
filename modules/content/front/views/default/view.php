<?php
/**
 * @var \app\modules\content\models\Content $content
 * @var array $goals
*/
?>
<div class="container">
    <div class="flex-container">
        <section class="center-block">
            <div class="content">
                <h1 class="yellow-title"><?=$content->title?></h1>
                <?=\yii\helpers\Html::img(\app\components\behaviors\PreviewBehaviour::getImageUrl( 'content', $content->image, $content->id, '_885x292_'))?>
                <?=$content->text?>
                <?php if (!empty($content->quote)) : ?>
                    <blockquote> <?=$content->quote?> </blockquote>
                <?php endif; ?>
                <?php if (!empty($goals)) : ?>
                    <p>
                        <strong><?=\Yii::t('front', 'Цели и задачи фонда:')?> </strong>
                    </p>
                    <?=\yii\helpers\Html::ul($goals)?>
                <?php endif; ?>

            </div>
        </section>
        <aside class="right-block">
            <?=\app\modules\pages\front\components\widgets\SidebarNewsWidget::widget(['isProgramm' => false])?>
            <?=\app\modules\pages\front\components\widgets\SidebarNewsWidget::widget(['isProgramm' => true])?>
        </aside>
    </div>
</div>