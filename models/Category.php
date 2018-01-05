<?php
namespace app\models;

use Yii;
use kartik\tree\models\Tree;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;

class Category extends Tree
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'alias',
                'immutable' => true,
            ],
        ]);
    }

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['alias', 'safe'];
        $rules[] = ['alias', 'unique'];
        $rules[] = ['alias', 'string', 'max' => 255];
        return $rules;
    }
}