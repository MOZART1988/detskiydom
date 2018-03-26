<?php

use yii\db\Migration;

class m180326_161140_add_news_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('pages', [
            'id' => 'pk',
            'short_text' => $this->string()->null(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->null(),
            'create_date' => $this->timestamp()->null(),
            'update_date' => $this->timestamp()->null(),
            'is_active' => $this->smallInteger()->defaultValue(1),
            'sefname' => $this->string()->notNull(),
            'image' => $this->string()->null(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('pages');
    }
}
