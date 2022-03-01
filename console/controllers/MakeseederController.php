<?php

namespace console\controllers;

use app\models\Make;
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
            $make->record_inset_date = new Expression('NOW()');;
            $make->record_update_date = new Expression('NOW()');;
            $make->author_id = 7;
            $make->save();
        }
    }
}
