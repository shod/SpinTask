<?php

/* @var $this yii\web\View */

$this->title = 'Buisness page';


$this->params['breadcrumbs'][] = ['label' => 'buisness list', 'url' => ['/site/catalog']];
$this->params['breadcrumbs'][] = $model->name;

$boolArr = [];
//  \app\models_ex\Company::getImageUrl() . $model->image; 
?>

<div class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <!--vendor-heading -->
                <div class="vendor-headings">
                    <h2 class="mb10">Quote save</h2>
                </div>
                <!--/.vendor-heading -->
            </div>
        </div>
    </div>
</div>
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                <div class="vendor-details">
                    
                    <div class="vendor-descriptions">
                        <p><?= $message; ?></p>
                    </div>
                   
                </div>
            </div>
      
        </div>
        <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <a href="<?= yii\helpers\Url::to(['site/buisness', 'id' => $model->company_id])?>" class="btn btn-default btn-lg">Go back</a>
                </div>
            </div>
    </div>
</div>