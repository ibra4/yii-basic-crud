<?php

namespace common\models;

use common\models\Validators\StatusValidator;
use common\queue\SendPostEmail;
use kartik\mpdf\Pdf;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int|null $status
 * @property int $model_id
 * @property int $make_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Make $make
 * @property Model $model
 */
class Post extends \yii\db\ActiveRecord
{

    public $start;
    public $end;

    const STATUS_INACTIVE = 0;
    const STATUS_PUBLISHED = 1;

    public function afterSave($insert, $changedAttributes)
    {
        if (!$insert) {
            if ($this->status == '0' && $changedAttributes['status'] == '1') {
                Yii::$app->queue->push(new SendPostEmail([
                    'post_title' => $this->title,
                    'post_id' => $this->id,
                ]));
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeSave($insert)
    {
        $this->document = Yii::$app->pdfGenerator->generatePostPdf($this);
        return parent::beforeSave($insert);
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

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
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'model_id', 'make_id'], 'required'],
            [['make_id'], 'exist', 'skipOnError' => true, 'targetClass' => Make::class, 'targetAttribute' => ['make_id' => 'id']],
            [['make_id'], StatusValidator::class, 'modelType' => Make::class, 'on' => 'create'],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::class, 'targetAttribute' => ['model_id' => 'id']],
            [['model_id'], StatusValidator::class, 'modelType' => Model::class, 'on' => 'create'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            'model_id' => 'Model',
            'make_id' => 'Make',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
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
