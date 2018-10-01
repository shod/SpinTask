<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seo Patterns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-pattern-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Seo Pattern', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'url:url',
            'controller',
            'parms:ntext',
            'title',
            //'keyword',
            //'description:ntext',
            //'h1',
            //'type',
            //'route',
            //'class',
            //'parms_crc',
            //'parms_md5',
            //'title_2',
            //'hide',
            //'setting_bit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
