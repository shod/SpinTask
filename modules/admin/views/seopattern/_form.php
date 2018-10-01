<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SeoPattern */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-pattern-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parms')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parms_crc')->textInput() ?>

    <?= $form->field($model, 'parms_md5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hide')->textInput() ?>

    <?= $form->field($model, 'setting_bit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
