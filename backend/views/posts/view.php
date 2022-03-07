<?php

use common\models\Post;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'status',
            'document' => [
                'attribute' => 'document',
                'format' => 'raw',
                'value' => function (Post $model) {
                    return $model->document ? Html::a('Download', "/$model->document", ['class' => 'btn btn-primary', 'target' => '_blank'])
                        : '<p class="text-danger">Document have not gneerated yet, save it to generate a PDF File</p>';
                }
            ],
            'model_id' => [
                "value" => function (Post $model, $widget) {
                    if ($model->model) {
                        return $model->model->name;
                    }
                },
                "label" => "Model"
            ],
            'make_id' => [
                "value" => function (Post $model, $widget) {
                    if ($model->make) {
                        return $model->make->name;
                    }
                },
                "label" => "Make"
            ],
            'created_at:date',
            'updated_at:date',
            [
                'label' => "Number of views",
                'value' => $num_of_views
            ]
        ],
    ]) ?>

</div>