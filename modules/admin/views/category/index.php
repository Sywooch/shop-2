<?php

use kartik\tree\TreeView;
use app\models\Category;
use \kartik\tree\Module;

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-index">
    <?php
		echo TreeView::widget([
			// single query fetch to render the tree
			// use the Categoryt model you have in the previous step
			'query' => Category::find()->addOrderBy('root, lft'),
			'headingOptions' => ['label' => 'Категории'],
			'fontAwesome' => true,     // optional
			'isAdmin' => true,         // optional (toggle to enable admin mode)
			'displayValue' => 1,        // initial display value
			'softDelete' => true,       // defaults to true
			'cacheSettings' => [
				'enableCache' => false   // defaults to true
			],
			'nodeAddlViews' => [
                Module::VIEW_PART_2 => '@app/modules/admin/views/category/_form'
            ]
		]);
	?>
</div>
