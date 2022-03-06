<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
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
            'updated_at:date'
        ],
    ]) ?>

</div>