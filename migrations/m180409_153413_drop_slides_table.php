<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `slides`.
 */
class m180409_153413_drop_slides_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('sliders');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('sliders', [
            'id' => $this->primaryKey(),
        ]);
    }
}
