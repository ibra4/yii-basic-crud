<?php

namespace console\controllers;

use common\models\User;
use yii\console\Controller;

class UserseederController extends Controller
{

    public function actionSeed()
    {

        $users = [1,2,3];
        foreach ($users as $user_idx) {
            $exists = User::findByUsernameWithoutStatus("user$user_idx");
            if (!$exists) {
                $user = new User();
                $user->username = "user$user_idx";
                $user->email = "user$user_idx@gmail.com";
                $user->status = User::STATUS_ACTIVE;
                $user->setPassword("12345678");
                $user->generateAuthKey();
                $user->save();
            }
        }
    }
}
