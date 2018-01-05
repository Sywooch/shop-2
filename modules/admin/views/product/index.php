<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	td {
		vertical-align: middle!important;
	}
</style>
<div class="product-index">

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-condensed table-bordered',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
                'attribute' => 'id',
                'headerOptions' => ['width' => '45'],
			],
            'title',
            'alias',
            [
                'attribute' => 'rating',
                'format'=>'integer',
                'headerOptions' => ['width' => '160'],
                'filter' => [
                    0 => 'Нулевой',
                    1 => '1 звезда',
                    2 => '2 звезды',
                    3 => '3 звезды',
                    4 => '4 звезды',
                    5 => '5 звезд',
                ],
            ],
            'annotation',
            [
                'attribute' => 'category_id',
                'format' => 'html',
                'label' => 'Категория',
                'value' => function($data) {
                    if ($data->category->name) {
                        return Html::tag('p', Html::encode($data->category->name));
                    }
                },
                'filter' => [
                    ArrayHelper::map(Category::find()->where('id')->all(), 'id', 	'name')
                ],
            ],
            [
                'format' => 'raw',
                'label' => 'Изображение',
                'value' => function($data) {
                    return Html::img($data->getImage(), [
                        'width'=>50,
                        'style'=>"
							margin:auto;
							display: block;    
							height: 50px;
							width: auto;"
                    ]);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}{link}',
            ],
        ],
    ]); ?>
</div>
