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

    <h4>Form property</h4>
    <div class="row">
        <div class="col-lg-6">
            <div class="card panel">
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                               
                                <div class="form-group field-serviceproperty-measure">
                                    <label class="control-label" for="serviceproperty-measure">Show in form</label>
                                    <label class="ks-checkbox-slider ks-on-off ks-solid ks-primary">
                                        <input type="checkbox" value="1"  name="ServiceProperty[showinform]" <?= ($model->isShowinform)? 'checked' : '' ; ?> >
                                        <span class="ks-indicator"></span>
                                        <span class="ks-on">On</span>
                                        <span class="ks-off">Off</span>
                                    </label>
                                    <div class="help-block"></div>
                                </div>

                                <div class="form-group field-serviceproperty-measure">
                                    <label class="control-label" for="serviceproperty-measure">Required</label>
                                    <label class="ks-checkbox-slider ks-on-off ks-solid ks-primary">
                                        <input type="checkbox" value="1"  name="ServiceProperty[required]" <?= ($model->isRequired)? 'checked' : '' ; ?>  />
                                        <span class="ks-indicator"></span>
                                        <span class="ks-on">On</span>
                                        <span class="ks-off">Off</span>
                                    </label>
                                    <div class="help-block"></div>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
