<?php
/**
 * @var array $result
*/
?>
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li>
                <?=\yii\helpers\Html::a('<img src="/images/icon-home.png" alt="">Главная',
                    \yii\helpers\Url::to(['/basepage/default/index']))?>
            </li>
            <?php foreach ($result as $item) : ?>
                <li><?=$item?></li>
            <?php endforeach ; ?>
        </ul>
    </div>
</div>