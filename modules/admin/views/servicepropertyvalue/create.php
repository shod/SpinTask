<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ServicePropertyValue */

$this->title = 'Create Service Property Value';
$this->params['breadcrumbs'][] = ['label' => 'Service Property Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-property-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
