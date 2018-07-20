<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ServicePropertyValue;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceProperty */

$this->title = 'Update Service Property: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => $model->service->name, 'url' => ['/admin/service/view', 'id' => $model->service_id]];
$this->params['breadcrumbs'][] = 'Update';

$valuesModel = new ServicePropertyValue();
$valuesModel->service_id = $model->service_id;
$valuesModel->service_property_id = $model->id;
?>
<div class="service-property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <h1>Values:</h1>

    <p>
        <?= $this->render('_form_value', [
            'model' => $valuesModel,
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'value',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"/>', ['/admin/servicepropertyvalue/update', 'id' =>  $model->id]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"/>', ['/admin/serviceproperty/update', 'id' =>  $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
