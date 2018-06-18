<?php
/**
 * @var \yii\web\View $this
*/
?>
<footer class="footer">
    <?=$this->render('_footer_menu')?>
    <div class="footer-content">
        <div class="container">
            <div class="footer-left">
                <div class="copyright">© <?=date('Y')?> <?=\Yii::t('front', 'Общественный фонд Кунбала')?></div>
            </div>
            <div class="footer-right">
                <p>
                    <i class="fa fa-map-marker" aria-hidden="true"></i><?=\Yii::t('front', 'Республика Казахстан 050000. г. Алматы, ул. Кабдолова, 26, здание МЦ "Авиценна".')?></p>
                <p>
                    <i class="fa fa-phone" aria-hidden="true"></i>+7(701) 794-12-95, +7(777) 591-00-77, +7(705) 888-80-98</p>
                <p>
                    <i class="fa fa-envelope" aria-hidden="true"></i>kunbala.fund@gmail.com</p>
            </div>
        </div>
    </div>
</footer>

