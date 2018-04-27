<div class="main-menu">
    <ul>
        <li class="<?=(\Yii::$app->request->url === '/') ? 'active' : ''?>">
            <a href="<?=\yii\helpers\Url::to(['/basepage/default/index'])?>">Главная</a>
        </li>
        <li class="<?=(\Yii::$app->controller->module->id === 'content' && \Yii::$app->controller->action->id === 'view' && (\Yii::$app->request->get('id') === '1')) ? 'active' : ''?>">
            <a href="<?=\yii\helpers\Url::to(['/content/default/view', 'id' => 1])?>">О фонде</a>
        </li>
        <li class="<?=(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'news' ||
        \Yii::$app->controller->action->id === 'news-view')) ? 'active' : ''?>">
            <a href="<?=\yii\helpers\Url::to(['/pages/default/news'])?>">Пресс-центр</a>
        </li>
        <li class="<?=(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'programms' ||
                \Yii::$app->controller->action->id === 'programm-view')) ? 'active' : ''?>">
            <a href="<?=\yii\helpers\Url::to(['/pages/default/programms'])?>">Программы фонда</a>
        </li>
        <li class="<?=(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'info' ||
                \Yii::$app->controller->action->id === 'info-view')) ? 'active' : ''?>">
            <a href="<?=\yii\helpers\Url::to(['/pages/default/info'])?>">Полезная информация</a>
        </li>
        <li class="<?=\Yii::$app->controller->module->id === 'histories' ? 'active' : ''?>">
            <a href="<?=\yii\helpers\Url::to(['/histories/default/index'])?>">Живые истории</a>
        </li>
        <li class="<?=(\Yii::$app->controller->module->id === 'content' && \Yii::$app->controller->action->id === 'contact') ? 'active' : ''?>">
            <a href="<?=\yii\helpers\Url::to(['/content/default/contact/'])?>">Контакты</a>
        </li>
    </ul>

    <div class="menu-dropdown">
        <?php if (\Yii::$app->request->url === '/') : ?>
            <a href="#" class="toggle-dropdown">Главная</a>
        <?php elseif (\Yii::$app->controller->module->id === 'content' && \Yii::$app->controller->action->id === 'view' && (\Yii::$app->request->get('id') === '1')) :?>
            <a href="#" class="toggle-dropdown">О фонде</a>
        <?php elseif(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'news' ||
            \Yii::$app->controller->action->id === 'news-view')) :?>
            <a href="#" class="toggle-dropdown">Пресс-центр</a>
        <?php elseif (\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'programms' ||
            \Yii::$app->controller->action->id === 'programm-view')) :?>
            <a href="#" class="toggle-dropdown">Программы фонда</a>
        <?php elseif(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'info' ||
            \Yii::$app->controller->action->id === 'info-view')) : ?>
            <a href="#" class="toggle-dropdown">Полезная информация</a>
        <?php elseif(\Yii::$app->controller->module->id === 'histories') : ?>
            <a href="#" class="toggle-dropdown">Живые истории</a>
        <?php elseif(\Yii::$app->controller->module->id === 'content' && \Yii::$app->controller->action->id === 'contact'): ?>
            <a href="#" class="toggle-dropdown">Контакты</a>
        <?php endif; ?>
        <div class="menu-dropdown--list">
            <ul>
                <li class="<?=(\Yii::$app->request->url === '/') ? 'active' : ''?>">
                    <a href="<?=\yii\helpers\Url::to(['/basepage/default/index'])?>">Главная</a>
                </li>
                <li class="<?=(\Yii::$app->controller->module->id === 'content' && \Yii::$app->controller->action->id === 'view' && (\Yii::$app->request->get('id') === '1')) ? 'active' : ''?>">
                    <a href="<?=\yii\helpers\Url::to(['/content/default/view', 'id' => 1])?>">О фонде</a>
                </li>
                <li class="<?=(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'news' ||
                        \Yii::$app->controller->action->id === 'news-view')) ? 'active' : ''?>">
                    <a href="<?=\yii\helpers\Url::to(['/pages/default/news'])?>">Пресс-центр</a>
                </li>
                <li class="<?=(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'programms' ||
                        \Yii::$app->controller->action->id === 'programm-view')) ? 'active' : ''?>">
                    <a href="<?=\yii\helpers\Url::to(['/pages/default/programms'])?>">Программы фонда</a>
                </li>
                <li class="<?=(\Yii::$app->controller->module->id === 'pages' && (\Yii::$app->controller->action->id === 'info' ||
                        \Yii::$app->controller->action->id === 'info-view')) ? 'active' : ''?>">
                    <a href="<?=\yii\helpers\Url::to(['/pages/default/info'])?>">Полезная информация</a>
                </li>
                <li class="<?=\Yii::$app->controller->module->id === 'histories' ? 'active' : ''?>">
                    <a href="<?=\yii\helpers\Url::to(['/histories/default/index'])?>">Живые истории</a>
                </li>
                <li class="<?=(\Yii::$app->controller->module->id === 'content' && \Yii::$app->controller->action->id === 'contact') ? 'active' : ''?>">
                    <a href="<?=\yii\helpers\Url::to(['/content/default/contact/'])?>">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</div>