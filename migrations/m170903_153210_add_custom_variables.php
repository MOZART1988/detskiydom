<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170903_153210_add_custom_variables extends Migration
{
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('custom_variables', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->defaultValue(1),
            'value' => $this->text()->null(),
            'lang_id' => $this->integer()->defaultValue(1),
            'create_date' => $this->timestamp()->null(),
            'update_date' => $this->timestamp()->null(),
            'is_active' => $this->smallInteger()->defaultValue(1),
        ], $tableOptions);
    }

    public function safeDown()
    {
        echo "m170903_153210_add_custom_variables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170903_153210_add_custom_variables cannot be reverted.\n";

        return false;
    }
    */
}
