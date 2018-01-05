<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m171212_081754_create_product_table extends Migration
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

        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'alias'=>$this->string()->notNull()->unique(),
            'rating'=>$this->integer()->defaultValue(0),
            'annotation'=>$this->string(),
            'image'=>$this->string()->defaultValue(null),
            'category_id'=>$this->integer()->defaultValue(0),
            'content' => $this->text(),
            'title_browser'=>$this->string()->defaultValue(null),
            'meta_keywords' => $this->string(),
            'meta_description' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
