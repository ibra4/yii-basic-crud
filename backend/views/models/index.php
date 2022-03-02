<?php

use common\models\Make;
use common\models\Model;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'make_id' => [
                "value" => function (Model $model, $widget) {
                    if ($model->make) {
                        return Html::a($model->make->name, Url::toRoute(["makes/view", 'id' => $model->make->id]));
                    }
                },
                "format" => "raw",
                "label" => "Make"
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
                'urlCreator' => function ($action, Model $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>


</div>