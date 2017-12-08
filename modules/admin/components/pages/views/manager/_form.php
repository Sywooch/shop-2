<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\components\pages\Module;
use vova07\imperavi\Widget as Imperavi;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model bupy7\pages\models\Page */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin();

echo $form->field($model, 'title')->textInput(['maxlength' => 255]);

echo $form->field($model, 'alias')->textInput(['maxlength' => 255]);

echo $form->field($model, 'published')->checkbox();

$settings = [
    'minHeight' => 200,
	'pastePlainText' => true,
	"plugins" =>  [
		"table", "fontcolor", "fontsize", "fontfamily",
		"video", "clips", "counter", "definedlinks",
		"filemanager", "imagemanager", "limiter", "textdirection",
		"textexpander", "fullscreen"
	],
];
//if ($module->imperaviLanguage) {
    $settings['lang'] = 'ru';
//}
//if ($module->addImage || $module->uploadImage) {
    $settings['plugins'][] = 'imagemanager';
//}
//if ($module->addImage) {
    $settings['imageManagerJson'] = Url::to(['images-get']);
//}
//if ($module->uploadImage) {
    $settings['imageUpload'] = Url::to(['image-upload']);
//}
//if ($module->addFile || $module->uploadFile) {
    $settings['plugins'][] = 'filemanager';
//}
//if ($module->addFile) {
    $settings['fileManagerJson'] = Url::to(['files-get']);
//}
//if ($module->uploadFile) {
    $settings['fileUpload'] = Url::to(['file-upload']);
//}
echo $form->field($model, 'content', [
		'options' => [
              'style' => 'max-width: 950px; margin:auto;',
          ]])->widget(Imperavi::className(), [
    'settings' => $settings,
]);

echo $form->field($model, 'title_browser')->textInput(['maxlength' => 255]);

echo $form->field($model, 'meta_keywords')->textInput(['maxlength' => 200]);

echo $form->field($model, 'meta_description')->textInput(['maxlength' => 160]);

echo $form->field($model, 'template')->dropdownList([
	'static' => 'Статичная страница',
	'products' => 'Товары',
	'services' => 'Услуги',
	'delivery' => 'Доставка',
	'contacts' => 'Контакты',
])->label('Шаблон');
?>

<ul>
	<li>Статичная страница - только контент из редактора</li>
	<li>Товары  - список категорий товаров + контент из редактора</li>
	<li>Услуги  - список категорий услуг + контент из редактора</li>
	<li>Доставка - калькулятор доставки + контент из редактора</li>
	<li>Контакты - контактные данные + контент из редактора</li>
</ul>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Module::t('CREATE') : Module::t('UPDATE'), [
        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
    ]); ?>
</div>
<?php ActiveForm::end(); ?>
