<?php
use yii\helpers\Html;
?>

<div class="row">
      <div class="col-sm-4">
            <?= $form->field($node, 'alias')->textInput(['maxlength' => true])->label('Алиас') ?>
      </div>
      <div class="col-sm-4">
            <?= $form->field($node, 'title')->textInput(['maxlength' => true])->label('Заголовок') ?>
      </div>
      <div class="col-sm-4">
            <?= $form->field($node, 'to_main')->checkbox(['label' => 'Показывать',])->label('На главной:') ?>
      </div>
</div>
<p><b>Изображение</b></p>
<div class="row">
      <div class="col-sm-12">
            <img  style="max-height: 150px; margin: 0 5px 5px 0"
                  src="<?= ($node->image != '') ? '/uploads/'.$node->image : 'http://placehold.it/220x150/FFF' ?>" />
      </div>
      <div class="col-sm-12">
            <?= Html::a('Загрузить', ['/admin/category/set-image', 'id' => $node->id], ['class' => 'btn btn-default'])?>
            <?= Html::a('Удалить ', ['/admin/category/del-image', 'id' => $node->id], ['class' => 'btn btn-default'])?>
      </div>
</div><br>