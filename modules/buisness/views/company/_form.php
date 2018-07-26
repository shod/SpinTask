<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="company-form">

    <?php $form = ActiveForm::begin([
        'action' => '/buisness/company/profile/' . $model->id,
        'options' => ['enctype' => 'multipart/form-data']]); ?>
    <h3>General Company Profile</h3>
    <?= $form->field($model, 'buisness_id')->hiddenInput(['value'=> $model->buisness_id])->label(false); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paid')->textInput() ?>

    <?= $form->field($model, 'extention')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ring_central_extention')->textInput(['maxlength' => true]) ?>

    <h3>Company Location</h3>
    
    
    
    <div class="row">
        <div class="col">
            state TODO
        </div>
        <div class="col">
            <?= $form->field($model, 'city_id')->textInput() ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'local_contact_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'local_phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?php if($model->image): ?>
        <div class="row">
            <div class="col">
                <img src="/uploads/company/<?= $model->image; ?>" height="100"/>
            </div>
            <div class="col">
                 <?= $form->field($model, 'imageFile')->fileInput() ?>
            </div>
        </div>
    <?php else: ?>
         <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php endif; ?>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
