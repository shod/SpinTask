<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Property Values';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-property-value-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service Property Value', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'service_id',
            'service_property_id',
            'value',
            'setting_bit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
