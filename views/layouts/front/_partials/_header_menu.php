<div class="main-menu">
    <ul>
        <li class="<?=(\Yii::$app->request->url === '/') ? 'active' : ''?>">
            <a href="<?=\yii\helpers\Url::to(['/basepage/default/index'])?>">Главная</a>
        </li>
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
            <a href="">Живые истории</a>
        </li>
        <li>
            <a href="">Контакты</a>
        </li>
    </ul>
</div>