<?php

use yii\db\Migration;

/**
 * Class m180410_063926_add_histories_table
 */
class m180410_063926_add_histories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('histories', [
            'id' => 'pk',
            'short_text' => $this->string()->null(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->null(),
            'create_date' => $this->timestamp()->null(),
            'update_date' => $this->timestamp()->null(),
            'is_active' => $this->smallInteger()->defaultValue(1),
            'sefname' => $this->string()->notNull(),
            'image' => $this->string()->null(),
            'user_image' => $this->string()->null()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('histories');

        return false;
    }

}
