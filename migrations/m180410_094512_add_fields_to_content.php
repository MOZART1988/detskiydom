<?php

use yii\db\Migration;

/**
 * Class m180410_094512_add_fields_to_content
 */
class m180410_094512_add_fields_to_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('content', 'quote', $this->string()->null());
        $this->addColumn('content', 'goals', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('content', 'quote');
       $this->dropColumn('content', 'goals');
    }
}
