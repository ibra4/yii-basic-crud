<?php

namespace common\models\Traits;

use yii\db\Expression;

trait TimestampsTrait
{

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = time();
        } else {
            $this->updated_at = time();
        }
        return parent::beforeSave($insert);
    }
}
