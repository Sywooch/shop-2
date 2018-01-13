<?php
use app\widgets\StaticContent;

echo 'Это страница контактов';
?>
<div class="static-content">
	<?= StaticContent::widget(['model' => $model]) ?>
</div>
