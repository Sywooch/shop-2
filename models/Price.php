<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_price".
 *
 * @property int $id
 * @property int $product_id
 * @property int $price
 * @property string $size
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'price'], 'required'],
            [['product_id', 'price'], 'integer'],
            [['size'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'ID товара',
            'price' => 'Цена',
            'size' => 'Объем',
        ];
    }

    public function saveCost($costs, $productId)
    {
        price::deleteAll(['product_id' => $productId]);

        foreach ($costs as $cost) {
            $model = new price();
            $model->product_id = $productId;
            $model->price = $cost['price'];
            $model->size = $cost['size'];
            $model->save();
        }

        return true;
    }

    public function getCost($id) {
        return price::findAll(['product_id' => $id]);
    }

    public function deleteCost($id) {
        return price::deleteAll(['product_id' => $id]);
    }
}
