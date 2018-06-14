<?php

use yii\db\Migration;

/**
 * Class m180614_114425_add_lang_id_to_news
 */
class m180614_114425_add_lang_id_to_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pages', 'lang_id', $this->integer()->notNull()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('pages', 'lang_id');
    }
}
