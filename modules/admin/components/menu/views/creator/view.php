<?php
#Copyright (c) 2017 Rafal Marguzewicz pceuropa.net LTD
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\modules\admin\components\menu\Menu;

$this->title = Yii::t('app', 'Вид');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo \yii\bootstrap\Html::tag('h1', $model->menu_name);

NavBar::begin();
echo Nav::widget([ 'options' => ['class' => 'navbar-nav navbar-left', 'style'=>'display: flex!important; justify-content: center; width: 100%;'],
					'items' => Menu::NavbarLeft($model->menu_id) ]);

echo Nav::widget([ 'options' => ['class' => 'navbar-nav navbar-right'],
					'items' => Menu::NavbarRight($model->menu_id)]);
NavBar::end();

?>


