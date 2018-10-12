<?php
/**
 * @var \app\modules\pages\models\Pages $model
 * @var \app\modules\pages\models\Pages[] $otherModels
*/
?>
<div class="container">
    <div class="flex-container">
        <section class="center-block">
            <h1 class="yellow-title"><?=$model->title?></h1>
            <div class="content">
                <?=$model->text?>
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
        </section>
        <aside class="right-block">
            <?php if (!empty($otherModels)) : ?>
                <h3 class="yellow-title"><?=\Yii::t('front', 'Другие статьи')?></h3>
                <div class="side-info">
                    <?php foreach ($otherModels as $model) : ?>
                        <div class="side-info-item">
                            <a href="<?=\yii\helpers\Url::to(['/pages/default/info-view', 'id' => $model->id])?>"><?=$model->title?></a>
                        </div>
                    <?php endforeach ; ?>
                    <a href="<?=\yii\helpers\Url::to(['/pages/default/info'])?>" class="btn btn--orangeSmall"><?=\Yii::t('front', 'Все статьи')?></a>
                </div>
            <?php endif; ?>
            <?=\app\modules\pages\front\components\widgets\ContactFormSidebarWidget::widget()?>
        </aside>
    </div>
</div>
