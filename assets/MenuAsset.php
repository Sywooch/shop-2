<?php
namespace app\assets;
#Copyright (c) 2016-2017 Rafal Marguzewicz pceuropa.net

use yii\web\AssetBundle as MenuAdminAsset;

class MenuAsset extends MenuAdminAsset {
    public $sourcePath = '@app/vendor/pceuropa/yii2-menu/assets';
    public $baseUrl = '@app/vendor/pceuropa/yii2-menu/';
    public $js = [
        'js/Sortable.min.js',
        'js/menu.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
