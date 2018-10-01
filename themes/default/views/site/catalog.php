<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Service;

/* @var $this yii\web\View */

//$this->title = $meta_title;
;?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <!-- page section -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">
                    <h1 class="page-title"> <?= $this->title; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->render('_filter', ['regions' => $regions, 'city' => $city, 'service' => $service]); ?>
<div class="content">
    <div class="container">
            <?=
                yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_company',
                'options' => [
                    'tag' => 'div',
                    'class' => 'row',
                    'id' => 'list-wrapper',
                ],
                'itemOptions' => [
                    'class' => 'col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12',
                ],
                'layout' => "{items}\n{pager}",
            ]);
            ?>
    </div>
</div>

