<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Service;

?>
<style>
    .page-header {
        background: url(/themes/default/images/<?= ( !empty(Yii::$app->request->seo->image) )? Yii::$app->request->seo->image : 'page-header.jpg'; ?>) no-repeat center;
    }
</style>
<div class="page-header">
    <div class="container">
        <div class="row">
            <!-- page section -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">
                    <h1 class="page-title"> <?= Yii::$app->request->seo->h1; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->render('_filter', ['regions' => $regions, 'city' => $city, 'service' => $service]); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <?=
                yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_company',
                'options' => [
                    'tag' => 'div',
                    'class' => 'col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12',
                    'id' => 'list-wrapper',
                ],
                'itemOptions' => [
                    'class' => 'vendor-thumbnail list-view',
                ],
                'layout' => '{items}<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="st-paginations mb60 mt20">{pager}</div></div>',
                'pager' => [
                   // 'nextPageCssClass' => 'mynext',
                   'options' => [
                        //'tag' => 'div',
                        'class' => 'pagination',
                    ],
                ],
            ]);
            ?>
            <?php if(count($filters)): ?>
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
    <!--                <div class="filter-form">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h3 class="widget-title">filter</h3>
                            </div>
                        </div>
                    </div>-->
                    <div class="sidebar">
                        <div class="widget widget-tags">
                            <h3 class="widget-title">Tags</h3>
                            <?php foreach ($filters as $value) {
                                $params = yii\helpers\Json::decode($value['parms']);
                                
                                echo Html::a($value['h1'], array_merge([$value['controller']], $params) );
                            }?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->render('_region', ['regions' => $regions, 'city' => $city,]); ?>

