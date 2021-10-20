<?php


namespace app\controllers;

use app\models\Game;
use Yii;
use yii\base\DynamicModel;
use yii\db\ActiveRecord;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;

class GameController extends ActiveController
{
    public $modelClass = \app\models\Game::class;

    public function actionSet($id)
    {
        $scoreParams = Yii::$app->request->post('score');

        $score = explode(':', $scoreParams);

        $game = Game::findOne($id);

        if (empty($game)) return "There is no game with this id.";

        $message = $this->checkVictory($score[0], $score[1]);

        if (!empty($message)){

            $game->clear();

            return $message;
        }

        $game->score_a = $score[0];
        $game->score_b = $score[1];

        $oldGame = $game->getOldAttributes();
        $shoots = $oldGame['shoots'];

        if (($game->score_a >= 20 && $game->score_b >= 20 && $shoots >= 1) || ($shoots >= 4)){

            $game->changeTurn();

        }else{

            $game->shoots = $game->shoots + 1;

        }
        
        $game->update();

        $player = $game->turn ? 'b' : 'a';

        return 'player ' . $player;

    }

    private function checkVictory($scorePlayerA, $scorePlayerB)
    {
        if ($scorePlayerA >= 21 && $scorePlayerB <= ($scorePlayerA - 2) ){
            return "Player A wins";
        }else if ($scorePlayerB >= 21 && $scorePlayerA <= ($scorePlayerB - 2) ){
            return "Player B wins";
        }
    }

}
