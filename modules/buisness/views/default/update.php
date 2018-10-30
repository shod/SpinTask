<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessOwner */

$this->title = 'Update Business Owner: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Business Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update ' . $model->name;
?>
<div class="business-owner-update">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <h1>Campaigns</h1>

    <p>
        <?= Html::a('Add campaign', ['/buisness/company/create', 'buisness_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProviderCampaign,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name,['/buisness/company/update', 'id' => $data->id]);
                },
            ],
            'created_at',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"/>', ['/buisness/company/delete', 'id' =>  $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
