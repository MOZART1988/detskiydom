<?php

use yii\db\Migration;

/**
 * Handles adding sort to table `info`.
 */
class m180423_061120_add_sort_column_to_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'sort', $this->integer()->defaultValue(1)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('pages', 'sort');
    }
}
