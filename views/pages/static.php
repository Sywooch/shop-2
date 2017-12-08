<?php
use app\widgets\StaticContent;

echo 'Это статичная страница';
?>
<div class="static-content">
	<?= StaticContent::widget(['model' => $model]) ?>
</div>