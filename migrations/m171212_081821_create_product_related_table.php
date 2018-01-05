<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_related`.
 */
class m171212_081821_create_product_related_table extends Migration
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

        $this->createTable('product_related', [
            'product_id' => $this->integer()->notNull(),
            'product_related'=>$this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('product_related');
    }
}
