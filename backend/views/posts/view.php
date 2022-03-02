<?php

use common\models\Post;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->id;
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
            'status',
            'model_id' => [
                "value" => function (Post $model, $widget) {
                    if ($model->model) {
                        return $model->model->name;
                    }
                },
                "label" => "Make"
            ],
            'make_id' => [
                "value" => function (Post $model, $widget) {
                    if ($model->make) {
                        return $model->make->name;
                    }
                },
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
        ],
    ]) ?>

</div>
