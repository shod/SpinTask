<?php 

use yii\helpers\Url;

$city_id = Yii::$app->request->get('city_id');
if($city_id){
    $dataUrl = [];
}elseif( Yii::$app->request->get('region_id') ){
    $dataUrl = [];
    foreach($city as $model){
        $params = array_merge(
            Yii::$app->request->seo->getUrlParams(), 
            ['region_id' => (string)Yii::$app->request->get('region_id'),'city_id' => (string)$model->id,]
        );
        $urlCity = Url::toRoute($params);

        if(strpos($urlCity, '?') !== false){
            continue;
        }
        $dataUrl[] = ['name' => $model->name, 'id' => $model->id, 'url' => $urlCity ];
                 
    }
}else{
    $dataUrl = [];
    foreach($regions as $model){
        $params = array_merge(
            Yii::$app->request->seo->getUrlParams(), 
            ['region_id' => (string)$model->id]
        );
        $urlCity = Url::to($params);
        if(strpos($urlCity, '?') !== false){
            continue;
        }
        $dataUrl[] = ['name' => $model->name, 'id' => $model->id, 'url' => $urlCity ];
                 
    }
}

$dataCount = count($dataUrl);
$size = ceil($dataCount / 4);

if($size){
    $data = array_chunk($dataUrl, $size);
}


?>
<?php if($size): ?>
    <div class="space-medium bg-white">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center">
                        <!-- section title start-->
                        <?php if( !Yii::$app->request->get('region_id') ): ?>
                            <h2 class="mb10">Choose Your Region</h2>
                        <?php else: ?>
                            <h2 class="mb10">Choose Your City</h2>
                        <?php endif;?>
                        <!-- /.section title start-->
                    </div>
                </div>
            </div>
            <div class="row">
          
                <?php foreach($data as $row): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="post-block text-center">
                            <div class="widget widget-category">
                                <ul>
                                    <?php foreach($row as $model): ?>
                                        <li><a href="<?= $model['url']; ?>"><?= $model['name']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>