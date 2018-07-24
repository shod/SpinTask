<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Service;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <div class="row">
        <div class="col-lg-4">
            <?=
            $this->render('_form', [
                'model' => new Service(),
            ])
            ?>
        </div>
    </div>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => 'industry',
                'attribute' => 'industry.name',
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name,['/admin/service/update', 'id' => $data->id]);
                },
            ],
        ],
    ]);
    ?>
</div>
