<?php

use yii\db\Migration;

class m170903_154316_add_title_to_custom_variables extends Migration
{
    public function safeUp()
    {
        $this->addColumn('custom_variables', 'title', $this->string()->notNull());
    }

    public function safeDown()
    {
        echo "m170903_154316_add_title_to_custom_variables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170903_154316_add_title_to_custom_variables cannot be reverted.\n";

        return false;
    }
    */
}
