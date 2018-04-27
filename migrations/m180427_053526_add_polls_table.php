<?php

use yii\db\Migration;

/**
 * Class m180427_053526_add_polls_table
 */
class m180427_053526_add_polls_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('poll', [
            'id' => 'pk',
            'answer' => $this->string()->notNull(),
            'count' => $this->integer()->defaultValue(0)->null(),
            'create_date' => $this->timestamp()->null(),
            'update_date' => $this->timestamp()->null(),
            'is_active' => $this->smallInteger()->defaultValue(1),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180427_053526_add_polls_table cannot be reverted.\n";

        return false;
    }
}
