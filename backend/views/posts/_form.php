<?php

use common\models\Make;
use common\models\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'model_id')->dropDownList(
        ArrayHelper::map(Model::find()->all(), 'id', 'name'),
        ['prompt' => '- Select -']
    ) ?>

    <?= $form->field($model, 'make_id')->dropDownList(
        ArrayHelper::map(Make::find()->all(), 'id', 'name'),
        ['prompt' => '- Select -']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>