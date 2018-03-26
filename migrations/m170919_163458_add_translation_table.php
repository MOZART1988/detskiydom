<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170919_163458_add_translation_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('source_message', [
            'id' => 'pk',
            'category' => Schema::TYPE_STRING,
            'message' => Schema::TYPE_TEXT
        ], $tableOptions);

        $this->createTable('message', [
            'id' => Schema::TYPE_INTEGER,
            'language' => Schema::TYPE_STRING,
            'translation' => Schema::TYPE_TEXT
        ], $tableOptions);

        $this->addPrimaryKey('is_language', 'message', ['id', 'language']);
        $this->addForeignKey('fk_message_source_message', 'message', 'id', 'source_message', 'id', 'CASCADE',
            'RESTRICT');
    }

    public function safeDown()
    {
        echo "m170919_163458_add_translation_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170919_163458_add_translation_table cannot be reverted.\n";

        return false;
    }
    */
}
