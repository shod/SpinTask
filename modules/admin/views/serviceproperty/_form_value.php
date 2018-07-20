<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicePropertyValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-property-value-form">

    <?php $form = ActiveForm::begin([
        'action' => '/admin/servicepropertyvalue/create',
        'options' => [
                'class' => 'form-inline'
             ]
    ]); ?>

    <?= $form->field($model, 'service_id')->hiddenInput(['value'=> $model->service_id])->label(false); ?>
    <?= $form->field($model, 'service_property_id')->hiddenInput(['value'=> $model->service_property_id])->label(false); ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true])->label(false) ?>
    <?= Html::submitButton('Add', ['class' => 'btn btn-primary mb-2']) ?>

    <?php ActiveForm::end(); ?>

</div>
