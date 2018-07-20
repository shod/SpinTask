<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new \app\models\CompanyService;
$model->company_id = $company->id;


/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="company-form">
    <h3>
        Please specify services your company provides
    </h3>
    <?php $form = ActiveForm::begin([
            'action' => '/buisness/company/service/' . $company->id,
            'options' => [
                    'class' => 'form-inline'
                 ]
        ]); ?>
        <ul>
            <?php foreach ($services as $service): ?>
                <?php if(!isset($values[$service->id])) continue; ?>
                <li>
                    <?= Html::checkbox('service['.$service->id.']', (isset($sericeList[$service->id])), ['label' => $service->name]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
