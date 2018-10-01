<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SeoPattern */

$this->title = 'Create Seo Pattern';
$this->params['breadcrumbs'][] = ['label' => 'Seo Patterns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-pattern-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
