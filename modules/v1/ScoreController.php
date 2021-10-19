<?php


namespace app\controllers;

use Yii;
use yii\db\ActiveRecord;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;

class CountryController extends ActiveController
{
    public $modelClass = \app\models\Score::class;

    public function actionSet()
    {
        $bodyParams = Yii::$app->request->getBodyParams();

        throw new BadRequestHttpException('testee');



    }
}
