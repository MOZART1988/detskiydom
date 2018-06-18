<?php
/**
 * @var \yii\web\View $this
*/
?>
<header class="header">
    <div class="container">
        <div class="header-content">
            <div class="header-left">
                <div class="header-contacts">
                    <div class="header-contact--title">
                        <i class="fa fa-phone" aria-hidden="true"></i> <?=\Yii::t('front', 'Контактный телефон')?> </div>
                    <div class="header-contact--info">
                        <div class="header-contact--tel"> +7 (777)
                            <span>591-00-77</span>
                        </div>
                    </div>
                </div>
                <div class="header-contacts">
                    <div class="header-contact--title">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> <?=\Yii::t('front', 'Адрес')?> </div>
                    <div class="header-contact--info">
                        <strong> <?=\Yii::t('front', 'Республика Казахстан 050000
                            <br> г. Алматы, ул. Кабдолова, 26, здание МЦ "Авиценна", вход слева.')?> </strong>
                    </div>
                </div>
            </div>
            <div class="header-center">
                <a href="<?=\yii\helpers\Url::to(['/basepage/default/index'])?>">
                    <img src="/images/logo.png" alt="">
                </a>
            </div>
            <div class="header-right">
                <a href="<?=\yii\helpers\Url::to(['/content/default/view', 'id' => 2])?>" class="btn btn--orange"> <?=\Yii::t('front', 'Сделайте свой вклад')?> </a>
                <a href="#" data-toggle="modal" data-target="#quiz-modal" class="btn btn--orangelight"> <?=\Yii::t('front', 'Участвуйте в опросе')?> </a>
            </div>
        </div>
        <?=$this->render('_header_menu')?>
    </div>
</header>