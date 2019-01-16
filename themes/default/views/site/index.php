<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
//$this->title = 'Main page';

?>

<div class="hero-section">
    <div class="container">
        <div class="row">
            <?php foreach($industry as $data): ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="real-wedding-block  text-center">
                                <!-- real wedding block -->
                        <div class="real-wedding-img">
                                    <!-- real wedding img -->
                                    <a href="<?= Url::to(['catalog/index', 'industry_id' => (string)$data->id]); ?>"><img src="img/industry/<?= $data->image; ?>" alt="<?= $data->name; ?>" class="img-fluid"></a>
                        </div>
                                <!-- /.real wedding img -->
                        <div class="real-wedding-content">
                            <!-- real wedding content -->
                            <h3 class="real-wedding-title"><a href="<?= Url::to(['catalog/index', 'industry_id' => $data->id]); ?>" class="title"><?= $data->name; ?></a></h3>
                        
                        </div>
                                <!-- /.real wedding img -->
                    </div>
                            <!-- /.real wedding block -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
