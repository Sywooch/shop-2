<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'alias',
            [
                'attribute' => 'rating',
                'format'=>'text',
                'value' =>
					function($data){
						switch ($data->rating) {
							case 0:
								return 'Нулевой';
							case 1:
								return '1 звезда';
							case 2:
								return '2 звезды';
							case 3:
								return '3 звезды';
							case 4:
								return '4 звезды';
							case 5:
								return '5 звезд';
						}
                	},
            ],
            'annotation',
            [
                'format' => 'html',
                'label' => 'Категория',
                'value' => function($data) {
                    return Html::tag('p', Html::encode($data->category->name));
                }
            ],
			[
                'attribute' => 'content',
                'format' => 'raw',
			],
            'title_browser',
            'meta_keywords',
            'meta_description',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'label' => 'Аватар',
                'value' => function($data) {
                    return Html::img($data->getImage(), ['width'=>100, 'style'=>""]);
                }
            ],
            [
                'attribute' => 'created_at',
                'format' =>  ['date', 'HH:mm dd.MM.YYYY'],
                'options' => ['width' => '180']
            ],
            [
                'attribute' => 'updated_at',
                'format' =>  ['date', 'HH:mm dd.MM.YYYY'],
                'options' => ['width' => '180']
            ],
        ],
    ]) ?>


	<div class="row">
		<?php foreach ($costs as $key => $cost) :?>
			<div class="col-sm-2">
					<div class="form-group field-price-price required">
						<label class="control-label" for="price-price">Цена</label>
						<input type="number"
							   id="price-price"
							   class="form-control"
							   name="Costs[<?=$key?>][price]"
							   aria-required="true"
							   value="<?=$cost['price']?>"
							   title="Укажите цену без денежных знаков. Например, 2000. Цена будет отображаться в рублях."
							   disabled="disabled">

						<div class="help-block"></div>
					</div>
				</div>
			<div class="col-sm-2">
					<label class="control-label" for="price-size">Объем</label>
					<input type="text"
						   id="price-size"
						   class="form-control"
						   name="Costs[<?=$key?>][size]"
						   maxlength="255"
						   value="<?=$cost['size']?>"
						   title="Укажите обьем. Например, 2л или 0.5мл"
						   disabled="disabled">

					<div class="help-block"></div>
				</div>
        <?php endforeach; ?>
	</div>

</div>
