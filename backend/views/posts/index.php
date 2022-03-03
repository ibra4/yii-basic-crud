<?php

use common\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use kartik\export\ExportMenu;

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

    <?= $this->render('_search', ['model' => $filterModel]) ?>

    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',
            'status',
            [
                "attribute" => 'make',
                'value' => 'make.name'
            ],
            [
                "attribute" => 'model',
                'value' => 'model.name'
            ],
            'created_at:date',
            'updated_at:date',
        ],
        'clearBuffers' => true, //optional
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::class],

            'id',
            'status',
            [
                "attribute" => 'make',
                'value' => 'make.name'
            ],
            [
                "attribute" => 'model',
                'value' => 'model.name'
            ],
            'created_at:date',
            'updated_at:date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Post $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>