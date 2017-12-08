<?php
use app\widgets\StaticContent;

echo 'Это страница услуг';
?>
<div class="static-content">
	<?= StaticContent::widget(['model' => $model]) ?>
</div>