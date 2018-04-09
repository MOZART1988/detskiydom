<?php

use yii\db\Migration;

/**
 * Class m180409_162612_add_create_Date_update_date_to_galleries
 */
class m180409_162612_add_create_Date_update_date_to_galleries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('galleries', 'create_date', $this->dateTime()->null());
        $this->addColumn('galleries', 'update_date', $this->dateTime()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180409_162612_add_create_Date_update_date_to_galleries cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180409_162612_add_create_Date_update_date_to_galleries cannot be reverted.\n";

        return false;
    }
    */
}
