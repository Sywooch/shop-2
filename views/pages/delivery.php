<?php
use app\widgets\StaticContent;

echo 'Это страница доставки';
?>
<div class="static-content">
	<?= StaticContent::widget(['model' => $model]) ?>
</div>