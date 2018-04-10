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
                        <i class="fa fa-phone" aria-hidden="true"></i> Контактный телефон </div>
                    <div class="header-contact--info">
                        <div class="header-contact--tel"> +7 (727)
                            <span>317-11-38</span>
                        </div>
                    </div>
                </div>
                <div class="header-contacts">
                    <div class="header-contact--title">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Адрес </div>
                    <div class="header-contact--info">
                        <strong> Республика Казахстан 050000
                            <br> г. Алматы, Проспект Абылай Хана 141 </strong>
                    </div>
                </div>
            </div>
            <div class="header-center">
                <a href="">
                    <img src="images/logo.png" alt=""> </a>
            </div>
            <div class="header-right">
                <a href="" class="btn btn--orange"> Сделайте свой вклад </a>
                <a href="" class="btn btn--orangelight"> Участвуйте в опросе </a>
            </div>
        </div>
        <?=$this->render('_header_menu')?>
    </div>
</header>