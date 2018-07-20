<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Industry */

$this->title = 'Create Industry';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['/admin/']];
$this->params['breadcrumbs'][] = ['label' => 'Industries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
