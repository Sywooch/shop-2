<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput([
		'minlength' => true,
		'maxlength' => true,
	])->hint('При изменении данного поля, старый пароль будет изменен.') ?>

    <?= $form->field($model, 'isAdmin')->dropdownList([
        0 => 'Юзер',
        1 => 'Админ',
    ]) ?>

    <?= $form->field($imageUpload, 'image')->fileInput(['maxlength' => false,])->label('Аватар') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
