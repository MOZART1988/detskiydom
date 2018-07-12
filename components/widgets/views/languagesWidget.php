<?php
/**
 * @var \app\modules\languages\models\Languages[] $languages
*/
?>

<div class="lang-selector">
    <a class="current-lang" href="javascript:void;"><?=\app\modules\languages\models\Languages::getCurrent()->title?></a>
    <ul>
    <?php foreach ($languages as $language) : ?>
        <li>
            <a href="/<?=$language->code?>"><?=$language->title?></a>
        </li>
    <?php endforeach ; ?>
    </ul>
</div>
