<?php

use yii\db\Migration;

/**
 * Class m180409_154147_add_galleries_table
 */
class m180409_154147_add_galleries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('galleries', [
            'id' => 'pk',
            'title' => $this->string()->notNull(),
            'sefname' => $this->text()->null(),
            'is_active' => $this->smallInteger()->defaultValue(1),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180409_154147_add_galleries_table cannot be reverted.\n";

        return false;
    }
}
