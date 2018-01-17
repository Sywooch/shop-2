<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <?= $form->field($model, 'id')->hiddenInput()->label(false); ?>
        <div class="col-sm-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'annotation')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($imageUpload, 'image')->fileInput(['maxlength' => false,])->label('Изображение') ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'rating')->dropdownList([
                0 => 'Нулевой',
                1 => '1 звезда',
                2 => '2 звезды',
                3 => '3 звезды',
                4 => '4 звезды',
                5 => '5 звезд',
            ]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name')); ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                'advlist autolink lists link charmap hr preview pagebreak',
                'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
                'save insertdatetime media table contextmenu template paste image responsivefilemanager filemanager',
            ],
            'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager link image media',
            'external_filemanager_path' => '/plugins/responsivefilemanager/filemanager/',
            'filemanager_title' => 'Responsive Filemanager',
            'external_plugins' => [
                //Иконка/кнопка загрузки файла в диалоге вставки изображения.
                'filemanager' => '/plugins/responsivefilemanager/filemanager/plugin.min.js',
                //Иконка/кнопка загрузки файла в панеле иснструментов.
                'responsivefilemanager' => '/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
            ],
        ]
    ]); ?>

    <br>
    <div class="row">
        <div class="col-sm-12" style="padding-bottom: 5px"><em>Параметры для таблицы, отображающейся в карточке товара</em></div>
    </div>
    <div class="row">
        <?php foreach ($options as $key => $option) :?>
                <div class="col-sm-4">
                    <div class="form-group field-option-title required">
                        <label class="control-label" for="option-title">Параметр</label>
                        <input type="text"
                               id="option-title"
                               class="form-control"
                               name="options[<?=$key?>][title]"
                               aria-required="true"
                               value="<?=$option['option_title']?>"
                               title="Укажите название параметра">

                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <label class="control-label" for="option-value">Значение</label>
                    <input type="text"
                           id="option-value"
                           class="form-control"
                           name="options[<?=$key?>][value]"
                           maxlength="255"
                           value="<?=$option['option_value']?>"
                           title="Укажите значение параметра">

                    <div class="help-block"></div>
                </div>
        <?php endforeach;?>

        <?php if (count($options)<6) : $key = count($options); while ($key<6):?>
            <div class="col-sm-4">
                    <div class="form-group field-option-title required">
                        <label class="control-label" for="option-title">Параметр</label>
                        <input type="text"
                               id="option-title"
                               class="form-control"
                               name="options[<?=$key?>][title]"
                               aria-required="true"
                               value=""
                               title="Укажите название параметра">

                        <div class="help-block"></div>
                    </div>
                </div>
            <div class="col-sm-2">
                <label class="control-label" for="option-value">Значение</label>
                <input type="text"
                       id="option-value"
                       class="form-control"
                       name="options[<?=$key?>][value]"
                       maxlength="255"
                       value=""
                       title="Укажите значение параметра">

                <div class="help-block"></div>
            </div>
        <?php $key++; endwhile; endif;?>
    </div>

    <?= $form->field($model, 'service')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                'advlist autolink lists link charmap hr preview pagebreak',
                'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
                'save insertdatetime media table contextmenu template paste image responsivefilemanager filemanager',
            ],
            'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager link image media',
            'external_filemanager_path' => '/plugins/responsivefilemanager/filemanager/',
            'filemanager_title' => 'Responsive Filemanager',
            'external_plugins' => [
                //Иконка/кнопка загрузки файла в диалоге вставки изображения.
                'filemanager' => '/plugins/responsivefilemanager/filemanager/plugin.min.js',
                //Иконка/кнопка загрузки файла в панеле иснструментов.
                'responsivefilemanager' => '/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
            ],
        ]
    ]); ?>

    <?= $form->field($model, 'content')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                'advlist autolink lists link charmap hr preview pagebreak',
                'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
                'save insertdatetime media table contextmenu template paste image responsivefilemanager filemanager',
            ],
            'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager link image media',
            'external_filemanager_path' => '/plugins/responsivefilemanager/filemanager/',
            'filemanager_title' => 'Responsive Filemanager',
            'external_plugins' => [
                //Иконка/кнопка загрузки файла в диалоге вставки изображения.
                'filemanager' => '/plugins/responsivefilemanager/filemanager/plugin.min.js',
                //Иконка/кнопка загрузки файла в панеле иснструментов.
                'responsivefilemanager' => '/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
            ],
        ]
    ]); ?>

    <?= $form->field($model, 'title_browser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <?php foreach ($costs as $key => $cost) :?>
            <div class="col-sm-2">
                <label class="control-label" for="price-size">Условие</label>
                <input type="text"
                        id="price-size"
                        class="form-control"
                        name="Costs[<?=$key?>][size]"
                        maxlength="255"
                        value="<?=$cost['size']?>"
                        title="Укажите обьем. Например, 2л или 0.5мл">

                <div class="help-block"></div>
            </div>
            <div class="col-sm-2">
                <div class="form-group field-price-price required">
                    <label class="control-label" for="price-price">Цена</label>
                    <input type="number"
                            id="price-price"
                            class="form-control"
                            name="Costs[<?=$key?>][price]"
                            aria-required="true"
                            value="<?=$cost['price']?>"
                            title="Укажите цену без денежных знаков. Например, 2000. Цена будет отображаться в рублях.">

                    <div class="help-block"></div>
                </div>
            </div>
        <?php endforeach;?>

        <?php if (count($costs)<3) : $key = count($costs); while ($key<3):?>
            <div class="col-sm-2">
                <label class="control-label" for="price-size">Условие</label>
                <input type="text"
                       id="price-size"
                       class="form-control"
                       name="Costs[<?=$key?>][size]"
                       maxlength="255"
                       value="<?php 
                                if ($key == 0) echo('Цена за 1 метр');
                                if ($key == 1) echo('Цена от 1–10 тонн');
                                if ($key == 2) echo ('Цена от 10 тонн');?>"
                       title="Укажите обьем. Например, 2л или 0.5мл">

                <div class="help-block"></div>
            </div>
            <div class="col-sm-2">
                <div class="form-group field-price-price required">
                    <label class="control-label" for="price-price">Цена</label>
                    <input type="number"
                            id="price-price"
                            class="form-control"
                            name="Costs[<?=$key?>][price]"
                            aria-required="true"
                            value=""
                            title="Укажите цену без денежных знаков. Например, 2000. Цена будет отображаться в рублях.">

                    <div class="help-block"></div>
                </div>
            </div>
        <?php $key++; endwhile; endif;?>
    </div>

    <?php //echo $form->field($model, 'created_at')->textInput() ?>
    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
