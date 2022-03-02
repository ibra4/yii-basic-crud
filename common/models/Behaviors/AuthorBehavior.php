<?php

namespace common\models\Behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class AuthorBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'setAuthor',
        ];
    }

    public function setAuthor(\yii\base\ModelEvent $event)
    {
        $this->owner->author_id = \Yii::$app->user->identity->id;
    }
}
