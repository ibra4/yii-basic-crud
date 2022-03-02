<?php

namespace common\models;

use Yii;
use common\models\Traits\TimestampsTrait;

/**
 * This is the model class for table "make".
 *
 * @property int $id
 * @property string $name
 * @property int|null $state
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $author_id
 *
 * @property User $author
 * @property Post[] $posts
 */
class Make extends \yii\db\ActiveRecord
{
    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = time();
            if (!Yii::$app instanceof Yii\console\Application) {
                $this->author_id = \Yii::$app->user->identity->id;
            }
        } else {
            $this->updated_at = time();
        }
        return parent::beforeSave($insert);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'make';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['state', 'author_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
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
            'state' => 'State',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['make_id' => 'id']);
    }
}
