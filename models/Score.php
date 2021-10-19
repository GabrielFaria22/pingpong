<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "score".
 *
 * @property int $id
 * @property int|null $score_a
 * @property int|null $score_b
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'score';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['score_a', 'score_b'], 'integer'],
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
}
