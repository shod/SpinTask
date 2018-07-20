<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicePropertyValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-property-value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'service_id')->hiddenInput(['value'=> $model->service_id])->label(false); ?>
    <?= $form->field($model, 'service_property_id')->hiddenInput(['value'=> $model->service_property_id])->label(false); ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
