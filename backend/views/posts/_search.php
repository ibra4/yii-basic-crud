<?php

use common\models\Make;
use common\models\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'model_id')->dropDownList(
                ArrayHelper::map(Model::find()->all(), 'id', 'name'),
                ['prompt' => '- Select -']
            ) ?>

        </div>
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'make_id')->dropDownList(
                ArrayHelper::map(Make::find()->all(), 'id', 'name'),
                ['prompt' => '- Select -']
            ) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'status') ?>
        </div>
        <div class="col-md-6 mb-4">
            <?= $form->field($model, 'start')->textInput(["type" => 'date']) ?>
        </div>
        <div class="col-md-6 mb-4">
            <?= $form->field($model, 'end')->textInput(["type" => 'date']) ?>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', '/posts', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>