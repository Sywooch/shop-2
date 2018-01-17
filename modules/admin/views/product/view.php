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
        <!-- <?= Html::a('Сопутствующий товары', [''], ['class' => 'btn btn-primary']) ?> -->
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
                'attribute' => 'description',
                'format' => 'raw',
            ],
            [
                'attribute' => 'service',
                'format' => 'raw',
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

    <br>

    <div class="row">
        <?php foreach ($options as $key => $option) :?>
                <div class="col-sm-4">
                    <div class="form-group field-option-title required">
                        <label class="control-label" for="option-title">Параметр</label>
                        <input type="text"
                               id="option-title"
                               class="form-control"
                               name="options[<?=$key?>][title]"
                               aria-required="true"
                               value="<?=$option['option_title']?>"
                               title="Укажите название параметра" 
                               disabled="disabled">

                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="control-label" for="option-value">Значение</label>
                    <input type="text"
                           id="option-value"
                           class="form-control"
                           name="options[<?=$key?>][value]"
                           maxlength="255"
                           value="<?=$option['option_value']?>"
                           title="Укажите значение параметра" 
                           disabled="disabled">

                    <div class="help-block"></div>
                </div>
        <?php endforeach;?>
    </div>

    <br>

    <div class="row">
        <?php foreach ($costs as $key => $cost) :?>
            <div class="col-sm-2">
                <label class="control-label" for="price-size">Условие</label>
                <input type="text"
                        id="price-size"
                        class="form-control"
                        name="Costs[<?=$key?>][size]"
                        maxlength="255"
                        value="<?=$cost['size']?>"
                        disabled="disabled">

                <div class="help-block"></div>
            </div>
            <div class="col-sm-2">
                <div class="form-group field-price-price required">
                    <label class="control-label" for="price-price">Цена</label>
                    <input type="number"
                            id="price-price"
                            class="form-control"
                            name="Costs[<?=$key?>][price]"
                            aria-required="true"
                            value="<?=$cost['price']?>"
                            disabled="disabled">

                    <div class="help-block"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
