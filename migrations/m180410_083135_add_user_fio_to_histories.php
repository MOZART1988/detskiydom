<?php

use yii\db\Migration;

/**
 * Class m180410_083135_add_user_fio_to_histories
 */
class m180410_083135_add_user_fio_to_histories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('histories', 'user_fio', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('histories', 'user_fio');
    }
}
