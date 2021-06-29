<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 */
class m210628_085253_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'status' => $this->boolean()->defaultValue(false),
            'published_at' => $this->datetime()->Null(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'slug'=>$this->string()->Null(255),
        ], $tableOptions);
        $this->createTable('{{%page_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
        ], $tableOptions);
        $this->createIndex('fk_page_created_by', '{{%page}}', 'created_by');
        $this->createIndex('fk_page_updated_by', '{{%page}}', 'updated_by');
        $this->addForeignKey('fk_page_created_by', '{{%page}}', 'created_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_page_updated_by', '{{%page}}', 'updated_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_page_lang', '{{%page_lang}}', 'owner_id', '{{%page}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_page_lang', '{{%page_lang}}');
        $this->dropTable('{{%page_lang}}');
        $this->dropTable('{{%page}}');
    }
}
