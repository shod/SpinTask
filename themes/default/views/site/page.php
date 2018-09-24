<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = $model->name;

?>

<div class="page-header">
    <!-- page-header -->
    <div class="container">
        <div class="row">
            <!-- page section -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">
                    <h1 class="page-title"><?= $model->name; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?= stripcslashes($model->text); ?>
            </div>
        </div>
    </div>
</div>
