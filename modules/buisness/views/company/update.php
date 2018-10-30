<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'Update Company: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Buisness', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->buisness->name, 'url' => ['/buisness/default/update', 'id' => $model->buisness->id]];
$this->params['breadcrumbs'][] = 'Update ' . $model->name;
?>
<div class="company-update">
	<style>
   li {
    list-style-type: none; /* Убираем маркеры */
   }
   ul {
    margin-left: 0; /* Отступ слева в браузере IE и Opera */
    padding-left: 0; /* Отступ слева в браузере Firefox, Safari, Chrome */
   }
  </style>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Company Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="false">ADD/REMOVE SERVICES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#service_details" role="tab" aria-controls="service_details" aria-selected="false">Edit Service details</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?= $this->render('_form', [
                'model' => $profileModel,
            ]) ?>
        </div>
        <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
            <?= $this->render('_form_service', [
                'company' => $model,
                'services' => $services,
                'sericeList' => $sericeList,
                'values' => $values,
            ]); ?>
        </div>
        <div class="tab-pane fade" id="service_details" role="tabpanel" aria-labelledby="service_details-tab">
            <?= $this->render('_form_service_details', [
                'company' => $model,
                'services' => $services,
                'sericeList' => $sericeList,
                'values' => $values,
                'valueList' => $valueList,
            ]); ?>
        </div>
    </div>
    
    

</div>
