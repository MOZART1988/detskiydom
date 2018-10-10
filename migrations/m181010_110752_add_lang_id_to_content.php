<?php

use yii\db\Migration;

/**
 * Class m181010_110752_add_lang_id_to_content
 */
class m181010_110752_add_lang_id_to_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content', 'lang_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181010_110752_add_lang_id_to_content cannot be reverted.\n";

        return false;
    }
}
