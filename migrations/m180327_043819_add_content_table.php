<?php

use yii\db\Migration;

/**
 * Class m180327_043819_add_content_table
 */
class m180327_043819_add_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('content', [
            'id' => 'pk',
            'title' => $this->string()->notNull(),
            'text' => $this->text()->null(),
            'create_date' => $this->timestamp()->null(),
            'update_date' => $this->timestamp()->null(),
            'is_active' => $this->smallInteger()->defaultValue(1),
            'sefname' => $this->string()->notNull(),
            'image' => $this->string()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('content');
    }
}
