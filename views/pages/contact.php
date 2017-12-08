<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контактная форма';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact" style="padding-bottom: 15px;">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Благодарим Вас за обращение к нам. Мы как можно скорее ответить вам.
        </div>

        <p>
			Обратите внимание, что если вы включите отладчик yii,
			вы должны быть в состоянии для просмотра сообщения электронной почты на панели отладчика.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <div class="row">

			<p class="col-lg-offset-2 col-lg-8" style="padding: 15px 0;">
				Если у вас есть бизнес-запросы или другие вопросы, пожалуйста заполните следующую форму для связи с нами. Спасибо.
			</p>

			<?php $form = ActiveForm::begin([
				'id' => 'contact-form',
				'fieldConfig' => [
					'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
					'labelOptions' => ['class' => 'col-lg-offset-1 col-lg-3 control-label', 'style'=>"text-align: right"],
				],
			]); ?>

				<?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Как Вас зовут') ?>

				<?= $form->field($model, 'email')->label('Электронная почта') ?>

				<?= $form->field($model, 'subject')->label('Тема') ?>

				<?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Сообщение') ?>

				<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
					'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
				]) ?>

				<div class="form-group">
					<div class="col-lg-12">
						<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
					</div>
				</div>

			<?php ActiveForm::end(); ?>

        </div>

    <?php endif; ?>
</div>
