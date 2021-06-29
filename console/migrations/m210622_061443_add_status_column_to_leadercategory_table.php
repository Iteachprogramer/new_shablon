<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%leadercategory}}`.
 */
class m210622_061443_add_status_column_to_leadercategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%leadercategory}}', 'status', $this->integer(11)->after('updated_at'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%leadercategory}}', 'status');
    }
}
