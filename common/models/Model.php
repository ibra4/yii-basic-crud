<?php

namespace common\models;

use common\models\Traits\TimestampsTrait;
use Yii;

/**
 * This is the model class for table "model".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $make_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Post[] $posts
 */
class Model extends \yii\db\ActiveRecord
{

    use TimestampsTrait;
    
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
            [['created_at', 'updated_at'], 'safe'],
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
            'make_id' => 'Make',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
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

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMake()
    {
        return $this->hasOne(Make::className(), ['id' => 'make_id']);
    }
}
