<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $make_id
 *
 * @property Post[] $posts
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['make_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'make_id' => 'Make ID',
        ];
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['model_id' => 'id']);
    }
}
