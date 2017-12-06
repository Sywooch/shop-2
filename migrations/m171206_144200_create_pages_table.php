<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m171206_144200_create_pages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'content' => 'MEDIUMTEXT',
            'keywords' => $this->string(),
            'description' => $this->string(),
            'template' => $this->string(),
            'status' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('pages');
    }
}
