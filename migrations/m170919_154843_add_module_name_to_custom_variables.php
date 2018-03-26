<?php

use yii\db\Migration;

class m170919_154843_add_module_name_to_custom_variables extends Migration
{
    public function safeUp()
    {
        $this->addColumn('custom_variables', 'module_name', $this->string()->null());
    }

    public function safeDown()
    {
        echo "m170919_154843_add_module_name_to_custom_variables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170919_154843_add_module_name_to_custom_variables cannot be reverted.\n";

        return false;
    }
    */
}
