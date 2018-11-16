<?php 

//dd($model);
$href = yii\helpers\Url::to(['site/buisness', 'id' => $model->id]);
?>
<!-- Vendor thumbnail -->
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="vendor-img">
            <!-- Vendor img -->
            <a href="<?= $href; ?>"><img src="<?= \app\models_ex\Company::getImageUrl() . $model->image; ?>" alt="" 
                              width="35" height="35"  class="img-fluid"></a>
        </div>
    </div>
    <!-- /.Vendor img -->
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="vendor-content">
            <!-- Vendor Content -->
            <h2 class="vendor-title"><a href="<?= $href; ?>" class="title"><?= $model->name; ?></a></h2>
            <p class="vendor-address"><?= $model->city->name; ?></p>
            <!-- /.Vendor meta -->
        </div>
        <!-- /.Vendor Content -->
    </div>
</div>

