<?php
use app\widgets\StaticContent;

echo 'Это страница товаров';
?>
<div class="static-content">
	<?= StaticContent::widget(['model' => $model]) ?>
</div>