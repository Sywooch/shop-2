<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_featured`.
 */
class m171212_081837_create_product_featured_table extends Migration
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

        $this->createTable('product_featured', [
            'product_id' => $this->integer()->notNull(),
            'product_featured'=>$this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('product_featured');
    }
}
