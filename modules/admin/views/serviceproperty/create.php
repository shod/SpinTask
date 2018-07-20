<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ServiceProperty */

$this->title = 'Create Service Property';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Service Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
