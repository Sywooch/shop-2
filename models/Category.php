<?php
namespace app\models;

use Yii;

class Category extends \kartik\tree\models\Tree
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tree';
    }

    /**
     * Override isDisabled method if you need as shown in the
     * example below. You can override similarly other methods
     * like isActive, isMovable etc.
     */
    public function isDisabled()
    {
//        if (!Yii::$app->user->identity->isAdmin) {
//            return true;
//        }
        return parent::isDisabled();
    }
}