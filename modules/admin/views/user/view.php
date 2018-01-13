<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            [
                'attribute' => 'isAdmin',
                'format'=>'text',
                'value'=>function($data){
                    return ($data->isAdmin > 0)?'Админ':'Юзер';
                },
            ],
            [
                'attribute' => 'photo',
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

</div>
