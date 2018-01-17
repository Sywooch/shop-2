<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_options_`.
 */
class m180117_115735_create_product_options__table extends Migration
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

        $this->createTable('product_options', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'option_title'=>$this->string()->notNull(),
            'option_value'=>$this->string()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('product_options');
    }
}
