<?php

use yii\db\Migration;

/**
 * Class m180410_104227_alter_table_goals_for_content
 */
class m180410_104227_alter_table_goals_for_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('content', 'goals', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180410_104227_alter_table_goals_for_content cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180410_104227_alter_table_goals_for_content cannot be reverted.\n";

        return false;
    }
    */
}
