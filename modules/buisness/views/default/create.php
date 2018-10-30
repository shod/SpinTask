<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BusinessOwner */

$this->title = 'Create Business Owner';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Business Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-owner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
