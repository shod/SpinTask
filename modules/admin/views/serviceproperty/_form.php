<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceProperty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'service_id')->hiddenInput(['value'=> $model->service_id])->label(false); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'bool' => 'Bool', 'string' => 'String', 'num' => 'Num', 'list' => 'List', ], ['prompt' => '', ]) ?>

    <?= $form->field($model, 'measure')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
