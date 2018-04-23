<?php

use yii\db\Migration;

/**
 * Class m180423_043709_add_slider_table
 */
class m180423_043709_add_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('slides', [
            'id' => 'pk',
            'title' => $this->string()->notNull(),
            'text' => $this->text()->null(),
            'create_date' => $this->timestamp()->null(),
            'update_date' => $this->timestamp()->null(),
            'is_active' => $this->smallInteger()->defaultValue(1),
            'image' => $this->string()->null(),
            'link' => $this->string()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('slides');
    }
}
