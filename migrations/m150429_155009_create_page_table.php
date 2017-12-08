<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * @author Vasilij Belosludcev http://mihaly4.ru
 * @since 1.0.0
 */
class m150429_155009_create_page_table extends Migration
{
    private $_tableName;

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        $this->_tableName = 'page';

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable( $this->_tableName, [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'alias'=>$this->string()->notNull()->unique(),
            'published' => $this->boolean()->defaultValue( true),
            'content' => $this->text(),
            'title_browser'=>$this->string()->defaultValue(null),
            'meta_keywords' => $this->string(),
            'meta_description' => $this->string(),
            'template'=>$this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->createIndex('alias_and_published', $this->_tableName, ['alias', 'published']);
    }

    public function down()
    {
        $this->dropTable($this->_tableName);
    }
}
