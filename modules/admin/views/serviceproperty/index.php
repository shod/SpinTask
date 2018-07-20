<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Properties';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Service', 'url' => ['/admin/service']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-property-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                          
            'name',
            'type',
            'measure',
            //'setting_bit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
