<?php
/**
 * @var \app\modules\languages\models\Languages [] $models
*/
?>

<!-- nav-lang -->
<div class="nav-lang">
    <ul class="list--inline">
        <?php foreach ($models as $model) : ?>
            <?php if ($model->id == app\modules\languages\models\Languages::getCurrent()->id) { ?>
                <li class="active"><a href="#"><?=$model->title?></a></li>
            <?php } else { ?>
                <li><a href="/<?=$model->code?>"><?=$model->title?></a></li>
            <?php } ?>
        <?php endforeach; ?>
    </ul>
</div>
<!-- /nav-lang -->
