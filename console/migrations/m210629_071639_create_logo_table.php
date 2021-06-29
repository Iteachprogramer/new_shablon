<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%logo}}`.
 */
class m210629_071639_create_logo_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%logo}}', [
            'id' => $this->primaryKey(),
            'img'=>$this->string(255)->notNull(),
            'status' => $this->boolean()->defaultValue(false),
        ], $tableOptions);
        $this->createTable('{{%logo_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->Null(),
            'subtitle'=>$this->string(255)->Null(),
        ], $tableOptions);
        $this->addForeignKey('fk_logo_lang', '{{%logo_lang}}', 'owner_id', '{{%logo}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_logo_lang', '{{%logo_lang}}');
        $this->dropTable('{{%logo_lang}}');
        $this->dropTable('{{%logo}}');
    }
}
