<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
$i = FALSE;
?>
<div class="company-form">
    <ul class="nav nav-tabs" id="serviceTab" role="tablist">
        <?php foreach ($services as $service): ?>
            <?php if(!isset($sericeList[$service->id])) continue; ?>
            <?php if(!isset($values[$service->id])) continue; ?>
            <li class="nav-item">
                <a class="nav-link <?= (!$i)? 'active': '' ?>" id="serv_<?= $service->id; ?>-tab" data-toggle="tab" 
                   href="#serv_<?= $service->id; ?>" role="tab" 
                   aria-controls="serv_<?= $service->id; ?>" aria-selected="true"><?= $service->name; ?></a>
            </li>
            <?php $i = TRUE; ?>
        <?php endforeach; ?>
    </ul>
        
    <?php 
        $i = FALSE;
    ?>
    <div class="tab-content" id="serviceContent">
        <?php foreach ($services as $service): ?>
            <?php if(!isset($sericeList[$service->id])) continue; ?>

            <div class="tab-pane fade  <?= (!$i)? 'show active': '' ?>" id="serv_<?= $service->id; ?>" role="tabpanel" aria-labelledby="serv_<?= $service->id; ?>-tab">
                <?php $form = ActiveForm::begin([
                    'action' => '/buisness/company/servicevalue/' . $company->id,
                    'options' => [
                            'class' => 'form-inline'
                         ]
                ]); ?>
                    <section>
                        <div class="row">
                            <div class="col">


                                <?= $form->field($service, 'id')
                                    ->hiddenInput(['value'=> $service->id])->label(false); ?>    
                                <ul>
                                    <?php if(isset($values[$service->id])) : ?>
                                        <?php foreach ($values[$service->id] as $value): ?>
                                            <li style="list-style: none;">
                                                <?= Html::checkbox('value['.$value->id.']', (isset($valueList[$value->id])), ['label' => $value->value]); ?>
                                            </li>
                                        <?php endforeach; ?>

                                    <?php endif;?>
                                </ul>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col">
                                <div class="form-group">
                                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php ActiveForm::end(); ?>
            </div>
             <?php $i = TRUE; ?>
        <?php endforeach; ?>
       
    </div>    

</div>
