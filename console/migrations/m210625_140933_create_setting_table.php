<?php

use yii\db\Migration;

class m210625_140933_create_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%setting}}', [
            'id' => $this->primaryKey(),
            'phone'=>$this->string(21)->notNull(),
            'email'=>$this->string(80)->notNull(),
            'faks'=>$this->string(21)->notNull(),
            'status'=>$this->integer(11)->notNull(),
        ],$tableOptions);
        $this->createTable('{{%setting_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'address' => $this->string(255)->notNull(),
        ], $tableOptions);
        $this->addForeignKey('fk_setting_lang', '{{%setting_lang}}', 'owner_id', '{{%setting}}', 'id', 'CASCADE', 'CASCADE');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setting}}');
    }
}
