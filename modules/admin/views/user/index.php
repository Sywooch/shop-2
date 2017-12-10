<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	td {
		vertical-align: middle!important;
	}
</style>
<div class="user-index">

    <?php  // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-condensed table-bordered',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            [
//				'attribute' => 'id',
//                'headerOptions' => ['width' => '80'],
//            ],
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
            [
                'attribute' => 'photo',
                'format' => 'raw',
                'label' => 'Аватар',
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
                'attribute' => 'created_at',
                'format' =>  ['datetime'],
                'options' => ['width' => '200'],
                'filter' => DatePicker::widget([
                    'name' => 'dp_1',
                    'type' => DatePicker::TYPE_INPUT,
					'separator' => '-',
                    'value' => '',
                    'pluginOptions' => [
						'todayHighlight' => true,
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
            ],
            [
                'attribute' => 'updated_at',
                'format' =>  ['datetime'],
                'options' => ['width' => '200'],
                'filter' => DatePicker::widget([
                    'name' => 'dp_1',
                    'type' => DatePicker::TYPE_INPUT,
                    'separator' => '-',
                    'value' => '',
                    'pluginOptions' => [
                        'todayHighlight' => true,
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
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
