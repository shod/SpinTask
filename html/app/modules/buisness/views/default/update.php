<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessOwner */

$this->title = 'Update Business Owner: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Business Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="business-owner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
