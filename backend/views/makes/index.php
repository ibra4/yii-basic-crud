<?php

use common\models\Make;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Makes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="make-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Make', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'state',
            'author_id' => [
                "value" => function (Make $model, $widget) {
                    if ($model->author) {
                        return Html::a($model->author->username, Url::toRoute(["users/view", 'id' => $model->author->id]));
                    }
                },
                "format" => "raw",
                "label" => "Authored By"
            ],
            [
                'attribute' => 'created_at',
                'format' => ['datetime', 'dd/mm/Y - H:i a']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['datetime', 'dd/mm/Y - H:i a']
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Make $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
