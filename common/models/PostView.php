<?php

namespace common\models;

use Yii;
use yii\mongodb\ActiveRecord;

class PostView extends ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->mongodb;
    }

    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'postview';
    }

    public function attributes()
    {
        return ['_id', 'views'];
    }
}
