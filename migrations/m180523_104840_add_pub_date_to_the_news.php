<?php

use yii\db\Migration;

/**
 * Class m180523_104840_add_pub_date_to_the_news
 */
class m180523_104840_add_pub_date_to_the_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'pub_date', $this->timestamp()->defaultValue('0000-00-00 00:00:00')->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180523_104840_add_pub_date_to_the_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180523_104840_add_pub_date_to_the_news cannot be reverted.\n";

        return false;
    }
    */
}
