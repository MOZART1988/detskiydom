<?php

use yii\db\Migration;

/**
 * Class m181010_101453_alter_column_title_slides
 */
class m181010_101453_alter_column_title_slides extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('slides', 'title', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181010_101453_alter_column_title_slides cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181010_101453_alter_column_title_slides cannot be reverted.\n";

        return false;
    }
    */
}
