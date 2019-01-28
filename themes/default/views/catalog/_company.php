<?php 

//dd($model);
$href = $model->getUrl();
$imgUrl = \app\models_ex\Company::getImageUrl();
if(empty($model->image) ){
    $imgUrl = '/img/plug.jpg';
}else{
    $imgUrl .= $model->image;
}
?>
<!-- Vendor thumbnail -->
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="vendor-img">
            <!-- Vendor img -->
            <a href="<?= $href; ?>"><img src="<?= $imgUrl; ?>" alt="<?= $model->name; ?>"   width="35" height="35"  class="img-fluid"></a>
        </div>
    </div>
    <!-- /.Vendor img -->
    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="vendor-content">
            <!-- Vendor Content -->
            <h2 class="vendor-title"><a href="<?= $href; ?>" class="title"><?= $model->name; ?></a></h2>
            <p class="vendor-address"><?= $model->city->name??''; ?></p>
            <!-- /.Vendor meta -->
        </div>
        <!-- /.Vendor Content -->
    </div>
</div>
