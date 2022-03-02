<?php

namespace console\controllers;

use common\models\Make;
use yii\console\Controller;
use yii\db\Expression;

class MakeseederController extends Controller
{

    public function actionSeed()
    {

        $makes = [1, 2, 3];
        foreach ($makes as $model_idx) {
            $make = new Make();
            $make->name = "model$model_idx";
            $make->state = rand(1, 3);
            $make->created_at = new Expression('NOW()');
            $make->updated_at = new Expression('NOW()');
            $make->author_id = 7;
            $make->save();
        }
    }
}
