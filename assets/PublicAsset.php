<?php

namespace app\assets;

use yii\web\AssetBundle;

class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'dist/assets/styles/app.min.css',
    ];
    public $js = [
        'dist/assets/scripts/app.min.js',
        'dist/assets/scripts/vue.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
