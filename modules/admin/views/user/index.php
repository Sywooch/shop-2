<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-condensed table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
				'attribute' => 'id',
                'headerOptions' => ['width' => '80'],
            ],
            'name',
            'email:email',
            [
                'attribute' => 'isAdmin',
				'format'=>'text',
				'content'=>function($data){
					return ($data->isAdmin > 0)?'Админ':'Юзер';
				},
				'filter' => [
					'1' => 'Админ',
					'0' => 'Юзер',
				]
            ],
            'photo',
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
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}{link}',
            ],
        ],
    ]); ?>
</div>
