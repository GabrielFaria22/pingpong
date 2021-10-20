<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%game}}`.
 */
class m211019_185247_create_game_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = 'engine InnoDB';
        $this->createTable('{{%game}}', [
            'id' => $this->primaryKey(),
            'score_a' => $this->integer(3)->defaultValue(0)->notNull(),
            'score_b' => $this->integer(3)->defaultValue(0)->notNull(),
            'turn' => $this->boolean()->defaultValue(false)->notNull(),
            'shoots' => $this->integer(2)->defaultValue(0)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%game}}');
    }
}
