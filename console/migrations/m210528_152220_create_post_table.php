<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m210528_152220_create_post_table extends Migration
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

        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'status' => $this->boolean()->defaultValue(false),
            'published_at' => $this->datetime()->Null(),
            'category_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        $this->createTable('{{%post_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
        ], $tableOptions);
        $this->createIndex('fk_post_category_id', '{{%post}}', 'category_id');
        $this->createIndex('fk_post_created_by', '{{%post}}', 'created_by');
        $this->createIndex('fk_post_updated_by', '{{%post}}', 'updated_by');
        $this->addForeignKey('fk_post_category_id', '{{%post}}', 'category_id', '{{%postcategory}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_post_created_by', '{{%post}}', 'created_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_post_updated_by', '{{%post}}', 'updated_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_post_lang', '{{%post_lang}}', 'owner_id', '{{%post}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_post_lang', '{{%post_lang}}');
        $this->dropTable('{{%post_lang}}');
        $this->dropTable('{{%post}}');
    }
}
