<?php
#Copyright (c) 2017 Rafal Marguzewicz pceuropa.net LTD

app\modules\admin\components\menu\MenuAsset::register($this);

$this->title = Yii::t('app', 'Редактировать');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_menu');?>


<div class="row">
	<?= $this->render('_form');?>
</div>

<?php 
$this->registerJs("var menu = new MyMENU.Menu({
	config: {
		setMysql: true,
		getMysql: true
	}

});", 4);
?>
