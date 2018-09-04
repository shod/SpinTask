<?php 

//dd($model);
$href = yii\helpers\Url::to(['site/buisness', 'id' => $model->id]);
?>
<div class="vendor-thumbnail">
    <!-- Vendor thumbnail -->
    <div class="vendor-img">
        <!-- Vendor img -->
        <a href="<?= $href; ?>">
            <?php if($model->image): ?>
                <img src="<?= \app\models_ex\Company::getImageUrl() . $model->image; ?>" width="55" height="55" class="img-fluid">
            <?php endif; ?>
        </a>
    </div>
    <!-- /.Vendor img -->
    <div class="vendor-content">
        <!-- Vendor Content -->
        <h2 class="vendor-title"><a href="<?= $href; ?>" class="title"><?= $model->name; ?></a></h2>
        <p class="vendor-address"><?= $model->city->name; ?></p>
<!--        <div class="vendor-meta">
            <span class="price-box vendor-meta-box">
            <span class="vendor-price">
                $150
            </span>
            <span>Start From</span>
            </span>
            <span class="guest-box vendor-meta-box"><span class="guest-no">
                120+
            </span>
            <span>Guest</span>
            </span>
            <span class="rating-box vendor-meta-box">
                <span class="rating-star">
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rated"></i>
                <i class="fa fa-star rate-mute"></i> 
                </span>
            <span class="rating-count">(20)</span></span>
        </div>-->
        <!-- /.Vendor meta -->
    </div>
    <!-- /.Vendor Content -->
</div>
<!-- /.Vendor thumbnail -->