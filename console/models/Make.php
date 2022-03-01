<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "make".
 *
 * @property int $id
 * @property string $name
 * @property int|null $state
 * @property string|null $record_inset_date
 * @property string|null $record_update_date
 * @property int $author_id
 *
 * @property User $author
 * @property Post[] $posts
 */
class Make extends \yii\db\ActiveRecord
{
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
            [['name', 'author_id'], 'required'],
            [['state', 'author_id'], 'integer'],
            [['record_inset_date', 'record_update_date'], 'safe'],
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
            'record_inset_date' => 'Record Inset Date',
            'record_update_date' => 'Record Update Date',
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
