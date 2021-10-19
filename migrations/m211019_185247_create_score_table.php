<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%score}}`.
 */
class m211019_185247_create_score_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = 'engine InnoDB';
        $this->createTable('{{%score}}', [
            'id' => $this->primaryKey(),
            'score_a' => $this->integer(3),
            'score_b' => $this->integer(3),
            'turn' => $this->boolean(),
            'rounds' => $this->integer(2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%score}}');
    }
}
