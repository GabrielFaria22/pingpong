<?php


namespace app\controllers;

use app\models\Score;
use Yii;
use yii\base\DynamicModel;
use yii\db\ActiveRecord;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;

class ScoreController extends ActiveController
{
    public $modelClass = \app\models\Score::class;

    public function actionSet($id)
    {
        $bodyParams = Yii::$app->request->getBodyParams();

        $necessaryFields = new DynamicModel(['playerA', 'playerB']);
        $necessaryFields->addRule(['playerA', 'playerB'], 'required');
        $necessaryFields->validate();


        $game = Score::findOne($id);

        $game->score_a = $bodyParams['playerA'];
        $game->score_b = $bodyParams['playerB'];

        $oldScore = $game->getOldAttributes();

        if ($oldScore['score_a'] >= 20 && $oldScore['score_b'] >= 20){
            
        }

        $game->update();

        return $game;

        

        

        throw new BadRequestHttpException('testee');



    }
}
