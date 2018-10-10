<?php

use yii\db\Migration;

/**
 * Class m181010_095611_change_default_value_for_lang_for_slides
 */
class m181010_095611_change_default_value_for_lang_for_slides extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('slides', 'lang_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181010_095611_change_default_value_for_lang_for_slides cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181010_095611_change_default_value_for_lang_for_slides cannot be reverted.\n";

        return false;
    }
    */
}
