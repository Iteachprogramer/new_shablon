<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%img}}`.
 */
class m210626_080522_create_img_table extends Migration
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

        $this->createTable('{{%img}}', [
            'id' => $this->primaryKey(),
            'img'=>$this->string(255)->notNull(),
            'status' => $this->boolean()->defaultValue(false),
            'published_at' => $this->datetime()->Null(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'slug'=>$this->string(255)->null(),
        ], $tableOptions);
        $this->createTable('{{%img_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
        ], $tableOptions);
        $this->createIndex('fk_img_created_by', '{{%img}}', 'created_by');
        $this->createIndex('fk_img_updated_by', '{{%img}}', 'updated_by');
        $this->addForeignKey('fk_img_created_by', '{{%img}}', 'created_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_img_updated_by', '{{%img}}', 'updated_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_img_lang', '{{%img_lang}}', 'owner_id', '{{%img}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_img_lang', '{{%img_lang}}');
        $this->dropTable('{{%img_lang}}');
        $this->dropTable('{{%img}}');
    }
}
