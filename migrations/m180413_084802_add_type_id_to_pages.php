<?php

use yii\db\Migration;

/**
 * Class m180413_084802_add_type_id_to_pages
 */
class m180413_084802_add_type_id_to_pages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'type_id', $this->integer()->defaultValue(1));
        $this->dropColumn('pages', 'is_programm');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180413_084802_add_type_id_to_pages cannot be reverted.\n";

        return false;
    }
}
