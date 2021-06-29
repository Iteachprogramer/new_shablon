<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leadercategory}}`.
 */
class m210618_113349_create_leadercategory_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%leadercategory}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(127),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%leadercategory_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'language' => $this->string(6)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
        ], $tableOptions);

        $this->addForeignKey('fk_leadercategory_lang', '{{%leadercategory_lang}}', 'owner_id', '{{%leadercategory}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_leadercategory_lang', '{{%leadercategory_lang}}');
        $this->dropTable('{{%leadercategory_lang}}');
        $this->dropTable('{{%leadercategory}}');
    }
}
