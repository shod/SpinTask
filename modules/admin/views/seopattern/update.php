<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeoPattern */

$this->title = 'Update Seo Pattern: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Seo Patterns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seo-pattern-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
