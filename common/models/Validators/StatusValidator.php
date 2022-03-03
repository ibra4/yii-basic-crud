<?php

namespace common\models\Validators;

use common\models\Make;
use yii\validators\Validator;

class StatusValidator extends Validator
{
    /**
     * $modelType
     * 
     * @var \yii\db\ActiveRecord
     */
    public $modelType;

    public function validateAttribute($model, $attribute)
    {
        $entity = $this->modelType::findOne($model->$attribute);
        if ($entity->status != 1) {
            $this->addError($model, $attribute, "The {attribute} must have status 1, got {status}", ['attribute' => $attribute, 'status' => $entity->status]);
        }
    }
}
