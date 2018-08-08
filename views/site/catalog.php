<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Service;

/* @var $this yii\web\View */

$this->title = 'Buisness list';
?>
<div class="ks-dashboard-tabbed-sidebar-widgets">
    <div class="row">
          <?=
          yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_company',
    ]);
    ?>
    </div>
</div>