<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessOwner */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Business Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-owner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at',
        ],
    ]) ?>
    
    <h1>Campaigns</h1>

    <p>
        <?= Html::a('Add campaign', ['/buisness/company/create', 'buisness_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProviderCampaign,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'created_at',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"/>', ['/buisness/company/update', 'id' =>  $model->id]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"/>', ['/buisness/company/update', 'id' =>  $model->id]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
