<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int|null $status
 * @property int $model_id
 * @property int $make_id
 *
 * @property Make $make
 * @property Model $model
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'model_id', 'make_id'], 'integer'],
            [['model_id', 'make_id'], 'required'],
            [['make_id'], 'exist', 'skipOnError' => true, 'targetClass' => Make::className(), 'targetAttribute' => ['make_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'model_id' => 'Model ID',
            'make_id' => 'Make ID',
        ];
    }

    /**
     * Gets query for [[Make]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMake()
    {
        return $this->hasOne(Make::className(), ['id' => 'make_id']);
    }

    /**
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::className(), ['id' => 'model_id']);
    }
}
