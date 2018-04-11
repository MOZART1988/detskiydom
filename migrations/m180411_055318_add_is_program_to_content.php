<?php

use yii\db\Migration;

/**
 * Class m180411_055318_add_is_program_to_content
 */
class m180411_055318_add_is_program_to_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'is_programm', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('pages', 'is_programm');
    }
}
