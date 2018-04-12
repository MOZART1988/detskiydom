<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.04.18
 * Time: 4:57 PM
 */
?>
<div class="footer-menu">
    <div class="container clearfix">
        <ul>
            <li class="<?=(\Yii::$app->controller->module->id === 'content') ? 'active' : ''?>">
                <a href="<?=\yii\helpers\Url::to(['/content/default/view', 'id' => 2])?>">О фонде</a>
            </li>
            <li class="<?=(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'news' ||
                    \Yii::$app->controller->action->id === 'news-view')) ? 'active' : ''?>">
                <a href="<?=\yii\helpers\Url::to(['/pages/default/news'])?>">Пресс-центр</a>
            </li>
            <li>
                <a href="">Программы фонда</a>
            </li>
            <li>
                <a href="">Полезная информация</a>
            </li>
            <li>
                <a href="">Юридическая поддержка</a>
            </li>
            <li>
                <a href="">Контакты</a>
            </li>
        </ul>
    </div>
</div>
