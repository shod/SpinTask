<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

//dd($exception);
?>

<div class="row">
    <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
        <!-- error-block -->
        <div class="error-block">
            <div class="error-content">
                <h1 class="error-title">Sorry</h1>
                <h2 class="error-second-title"><?= Html::encode($exception->statusCode) ?> <?= Html::encode($exception->getMessage()) ?></h2>
                <p class="lead">The Link is brokern or the page has beed moved. Try these pages instead:</p>
            </div>
        </div>
        <!-- /.error-block -->
        <!-- simple-links -->
        <div class="simple-links">
            <ul class="list-unstyled">
                <li><a href="<?= yii\helpers\Url::to(['site/page', 'id' => 5]); ?>">Terms Of Service Agreement</a></li>
                <li><a href="<?= yii\helpers\Url::to(['site/page', 'id' => 4]); ?>">Privacy Policy</a></li>
            </ul>
        </div>
        <!-- simple-links -->
    </div>
</div>