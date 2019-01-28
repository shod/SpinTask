<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

$this->title = $title;

?>

<div class="page-header">
    <!-- page-header -->
    <div class="container">
        <div class="row">
            <!-- page section -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">
                    <h1 class="page-title"><?= $title; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout'=> "{items}\n{pager}",
                    'columns' => [
                        [
                            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                            'format' => 'html',
                            'value' => function ($data) {
                                return Html::a($data->name, ['/site/catalog','service_id' => $data->id]); // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],
                        [
                            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                            'format' => 'html',
                            'value' => function ($data) {
                                return Html::a('sitemap', ['/sitemap/service','id' => $data->id], ['class' => 'small']); // $data['name'] for array data, e.g. using SqlDataProvider.
                            },
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
