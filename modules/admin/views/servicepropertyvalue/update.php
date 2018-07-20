<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ServicePropertyValue */

$this->title = 'Update Service Property Value: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Service Property Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-property-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
