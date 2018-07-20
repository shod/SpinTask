<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
$i = FALSE;
?>
<div class="company-form">

    <?php $form = ActiveForm::begin([
            'action' => '/buisness/company/servicevalue/' . $company->id,
            'options' => [
                    'class' => 'form-inline'
                 ]
        ]); ?>
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
                    <ul>
                        <?php 
                        if(isset($values[$service->id])) :
                            foreach ($values[$service->id] as $value): ?>
                                <li>
                                    <?= Html::checkbox('value['.$value->id.']', (isset($valueList[$value->id])), ['label' => $value->value]); ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </ul>
                </div>
                <?php $i = TRUE; ?>
            <?php endforeach; ?>
        </div>    
    <?php ActiveForm::end(); ?>

</div>
