<?php 
namespace app\modules\admin\components\menu;
#Copyright (c) 2016-2017 Rafal Marguzewicz pceuropa.net

use yii\web\AssetBundle as MenuAdminAsset;

class MenuAsset extends MenuAdminAsset {
    public $sourcePath = '@app/modules/admin/components/menu/assets';
    public $baseUrl = '@web';
    public $js = [
        'js/Sortable.min.js',
        'js/menu.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
