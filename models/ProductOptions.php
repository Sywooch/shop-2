<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_options".
 *
 * @property int $id
 * @property int $product_id
 * @property string $option_title
 * @property string $option_value
 */
class ProductOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'option_title', 'option_value'], 'required'],
            [['product_id'], 'integer'],
            [['option_title', 'option_value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'option_title' => 'Option Title',
            'option_value' => 'Option Value',
        ];
    }

    public function saveOptions($options, $productId)
    {
        ProductOptions::deleteAll(['product_id' => $productId]);

        foreach ($options as $option) {
            $model = new ProductOptions();
            $model->product_id = $productId;
            $model->option_title = $option['title'];
            $model->option_value = $option['value'];
            $model->save();
        }

        return true;
    }

    public function getOptions($id) {
        return ProductOptions::findAll(['product_id' => $id]);
    }

    public function deleteOptions($id) {
        return ProductOptions::deleteAll(['product_id' => $id]);
    }
}
