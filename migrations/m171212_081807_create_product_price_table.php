<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_price`.
 */
class m171212_081807_create_product_price_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('product_price', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'price'=>$this->integer()->notNull(),
            'size'=>$this->string(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('product_price');
    }
}
