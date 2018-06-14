<?php

use yii\db\Migration;

/**
 * Class m180614_113443_add_lang_id_to_slides
 */
class m180614_113443_add_lang_id_to_slides extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('slides', 'lang_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('slides', 'lang_id');
    }
}
