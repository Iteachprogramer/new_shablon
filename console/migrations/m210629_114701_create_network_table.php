<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%network}}`.
 */
class m210629_114701_create_network_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%network}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255)->null(),
            'icon'=>$this->string(255)->notNull(),
            'url'=>$this->string(255)->notNull(),
            'status'=>$this->integer(11)->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%network}}');
    }
}
