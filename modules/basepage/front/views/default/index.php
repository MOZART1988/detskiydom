<?php
/**
 * @var \app\modules\custom_variables\models\CustomVariables[] $variables
*/
?>
<!-- page -->
<div class="page">
    <?php foreach ($variables as $variable) : ?>
        <?=$variable->value?>
    <?php endforeach ; ?>
</div>