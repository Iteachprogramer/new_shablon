<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%useful}}`.
 */
class m210629_060126_create_useful_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%useful}}', [
            'id' => $this->primaryKey(),
            'img'=>$this->string(255)->notNull(),
            'url'=>$this->string(255)->notNull(),
            'status' => $this->boolean()->defaultValue(false),
        ], $tableOptions);
        $this->createTable('{{%useful_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->notNull(),
        ], $tableOptions);
        $this->addForeignKey('fk_useful_lang', '{{%useful_lang}}', 'owner_id', '{{%useful}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_useful_lang', '{{%useful_lang}}');
        $this->dropTable('{{%useful_lang}}');
        $this->dropTable('{{%useful}}');
    }
}
