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
            $make->name = "Make $model_idx";
            $make->state = rand(1, 3);
            $make->created_at = time();
            $make->author_id = 1;
            $make->save();
        }
    }
}
