<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SeoPattern */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Seo Patterns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-pattern-view">

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
            'url:url',
            'controller',
            'parms:ntext',
            'title',
            'keyword',
            'description:ntext',
            'h1',
            'type',
            'route',
            'class',
            'parms_crc',
            'parms_md5',
            'title_2',
            'hide',
            'setting_bit',
        ],
    ]) ?>

</div>
