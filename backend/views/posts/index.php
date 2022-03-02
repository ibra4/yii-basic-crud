<?php

use common\models\Make;
use common\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status',
            'make_id' => [
                "value" => function (Post $model, $widget) {
                    if ($model->make) {
                        return Html::a($model->make->name, Url::toRoute(["makes/view", 'id' => $model->make->id]));
                    }
                },
                "format" => "raw",
                "label" => "Make"
            ],
            'model_id' => [
                "value" => function (Post $model, $widget) {
                    if ($model->model) {
                        return Html::a(Html::encode($model->model->name), Url::toRoute(["models/view", 'id' => $model->model->id]));
                    }
                },
                "format" => "raw",
                "label" => "Model"
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Post $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
