<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leader}}`.
 */
class m210618_114314_create_leader_table extends Migration
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

        $this->createTable('{{%leader}}', [
            'id' => $this->primaryKey(),
            'status' => $this->boolean()->defaultValue(false),
            'phone'=>$this->string(21),
            'email'=>$this->string(255),
            'faks'=>$this->string(50),
            'published_at' => $this->datetime()->Null(),
            'category_id' => $this->integer()->null(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        $this->createTable('{{%leader_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'name' => $this->string(255)->notNull(),
            'position' => $this->text(),
            'activity'=>$this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'biography'=>$this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'reception_days'=>$this->string(255)->null(),

        ], $tableOptions);
        $this->createIndex('fk_leader_category_id', '{{%leader}}', 'category_id');
        $this->createIndex('fk_leader_created_by', '{{%leader}}', 'created_by');
        $this->createIndex('fk_leader_updated_by', '{{%leader}}', 'updated_by');
        $this->addForeignKey('fk_leader_category_id', '{{%leader}}', 'category_id', '{{%leadercategory}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_leader_created_by', '{{%leader}}', 'created_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_leader_updated_by', '{{%leader}}', 'updated_by', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_leader_lang', '{{%leader_lang}}', 'owner_id', '{{%leader}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_leader_lang', '{{%leader_lang}}');
        $this->dropTable('{{%leader_lang}}');
        $this->dropTable('{{%leader}}');
    }
}
