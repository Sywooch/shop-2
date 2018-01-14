<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\components\pages\Module;
use vova07\imperavi\Widget as Imperavi;
use dosamigos\tinymce\TinyMce;
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
          ]])->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'ru',
            'clientOptions' => [
                'plugins' => [
                    'advlist autolink lists link charmap hr preview pagebreak',
                    'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
                    'save insertdatetime media table contextmenu template paste image responsivefilemanager filemanager',
                ],
                'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | fontsizeselect | bullist numlist outdent indent | responsivefilemanager link image media',
                'fontsize_formats' => '8px 10px 12px 14px 18px 24px 36px 38px 40px 42px 46px',
                'external_filemanager_path' => '/plugins/responsivefilemanager/filemanager/',
                'filemanager_title' => 'Responsive Filemanager',
                'external_plugins' => [
                    //Иконка/кнопка загрузки файла в диалоге вставки изображения.
                    'filemanager' => '/plugins/responsivefilemanager/filemanager/plugin.min.js',
                    //Иконка/кнопка загрузки файла в панеле иснструментов.
                    'responsivefilemanager' => '/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
                ],
            ]
        ]);

echo $form->field($model, 'title_browser')->textInput(['maxlength' => 255]);

echo $form->field($model, 'meta_keywords')->textInput(['maxlength' => 200]);

echo $form->field($model, 'meta_description')->textInput(['maxlength' => 160]);

echo $form->field($model, 'template')->dropdownList([
    'static' => 'Статичная страница',
    'products' => 'Товары',
    'services' => 'Услуги',
    'price' => 'Прайс',
    'delivery' => 'Доставка',
    'contacts' => 'Контакты',
])->label('Шаблон');
?>

<ul>
    <li>Статичная страница - только контент из редактора</li>
    <li>Товары  - список категорий товаров + контент из редактора</li>
    <li>Услуги  - список категорий услуг + контент из редактора</li>
    <li>Прайс  - прайс-лист товаров + контент из редактора</li>
    <li>Доставка - калькулятор доставки + контент из редактора</li>
    <li>Контакты - контактные данные + контент из редактора</li>
</ul>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Module::t('CREATE') : Module::t('UPDATE'), [
        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
    ]); ?>
</div>
<?php ActiveForm::end(); ?>
