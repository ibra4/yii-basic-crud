<?php

namespace console\controllers\seeders;

use common\models\Model;
use yii\console\Controller;
use yii\db\Expression;

class ModelseederController extends Controller
{

    public function actionSeed()
    {

        $models = [1, 2, 3];
        foreach ($models as $model_idx) {
            $make = new Model();
            $make->name = "Model $model_idx";
            $make->make_id = 1;
            $make->created_at = time();
            $make->save();
        }
    }
}
