<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin([
        'action' => '/admin/service/create',
        'options' => [
              //  'class' => 'form-inline'
             ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'industry_id')->dropDownList(
     yii\helpers\ArrayHelper::map(app\models\Industry::find()->all(), 'id', 'name')
        ); ?>

    <div class="form-group">
        <?= Html::submitButton(($model->id)?'Save':'Add', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
