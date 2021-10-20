<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property int $id
 * @property int|null $score_a
 * @property int|null $score_b
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['score_a', 'score_b', 'shoots'], 'integer'],
            [['turn'], 'boolean']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'score_a' => 'Score A',
            'score_b' => 'Score B',
        ];
    }

    public function changeTurn()
    {
        $this->turn = !$this->turn;
        $this->shoots = 0;
    }

    public function clear()
    {
        $this->score_a = 0;
        $this->score_b = 0;
        $this->turn = 0;
        $this->shoots = 0;
        $this->update();
    }

}
