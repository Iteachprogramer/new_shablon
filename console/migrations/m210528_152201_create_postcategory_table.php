<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%postcategory}}`.
 */
class m210528_152201_create_postcategory_table extends Migration
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

        $this->createTable('{{%postcategory}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(127),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%postcategory_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->notNull(),
        ], $tableOptions);
        $this->addForeignKey('fk_postcategory_lang', '{{%postcategory_lang}}', 'owner_id', '{{%postcategory}}', 'id', 'CASCADE', 'CASCADE');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_postcategory_lang', '{{%postcategory_lang}}');
        $this->dropTable('{{%postcategory_lang}}');
        $this->dropTable('{{%postcategory}}');
    }
}
