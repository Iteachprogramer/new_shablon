<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%postcategory}}`.
 */
class m210622_061705_add_status_column_to_postcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%postcategory}}', 'status', $this->integer(11)->after('updated_at'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%postcategory}}', 'status');
    }
}
