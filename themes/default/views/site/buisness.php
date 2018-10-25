<?php

/* @var $this yii\web\View */

$this->title = 'Buisness page';


$this->params['breadcrumbs'][] = ['label' => 'buisness list', 'url' => ['/site/catalog']];
$this->params['breadcrumbs'][] = $model->name;

$boolArr = [];
$serviceForm = [];
//  \app\models_ex\Company::getImageUrl() . $model->image; 
?>

<div class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <!--vendor-heading -->
                <div class="vendor-headings">
                    <h2 class="mb10"><?= $model->name; ?></h2>
                    <p class="vendor-address"><?= $model->city->name; ?>. <a href="#map" class="btn-secondary-link ml-2">View Map</a> </p>
                </div>
                <!--/.vendor-heading -->
            </div>
        </div>
    </div>
</div>
<div class="vendor-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                <div class="vendor-details">
                    <? // $this->render('_vendor_info'); ?>
                    
                    <div class="vendor-descriptions">
                        <h3 class="border-bottom mb20 pdb10">About Service</h3>
                        <p><?= $model->description; ?></p>
                    </div>
                    <!--vendor-description -->
                    <!--venue-highlights -->
                    <?php if(count($boolArr) < count($companyService)): ?>
                    <div class="venue-highlights">
                        <h3 class="border-bottom mb20 pdb10">Services</h3>
                        <ul class="list-unstyled text-dark">
                            <?php foreach ($companyService as $cs): ?>
                            <?php 
                                $val = $cs->companyServiceValues[0];
                                $service = $val->servicePropertyValue->serviceProperty;
                                if($service->isShowinform){
                                    $serviceForm[$service->id] =   $service;
                                }
                            ?>
                                <?php if($service->type == 'bool'): ?>
                                <?php $boolArr[] = $val;?>
                                <?php else: ?>
                                    <li>
                                        <div><?= $service->name; ?>
                                            <div class="venue-highlight-meta"><?= $val->servicePropertyValue->value; ?> <?= $service->measure; ?></div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                        </ul>
                    </div>
                    <?php endif; ?>
                    <!-- /.venue-highlights -->
                    <!-- aminities-block -->
                    <?php if(count($boolArr)): ?>
                        <div class="amenities-block">
                            <h3 class="border-bottom mb20 pdb10">Services</h3>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="animities-list">
                                        <ul class="list-unstyled arrow">
                                            <?php foreach ($boolArr as $val): ?>
                                            <?php 
                                                $service = $val->servicePropertyValue->serviceProperty;
                                            ?>
                                                <li><?= $service->name ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?= $this->render('buisness/map', ['model' => $model]); ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                <div class="sidebar-venue">
                    <div class="well-box-dark">
                        <form action="/quote/<?= $model->id; ?>">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h3 class="mb30">Request Quote</h3>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="name">Name</label>
                                        <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
                                    </div>
                                </div>
                               
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class=" control-label sr-only" for="phone">Phone</label>
                                        <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <?php if(count($boolArr)): ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb20">
                                        <!-- aminites -->
                                        <div class="aminities">
                                        <?php foreach ($boolArr as $val): ?>
                                       <?php 
                                           $service = $val->servicePropertyValue->serviceProperty;
                                       ?>
                                           <div class="custom-control custom-checkbox">
                                               <input type="checkbox" class="custom-control-input" id="customCheck1"  name="<?= $service->name; ?>" >
                                               <label class="custom-control-label" for="customCheck1"> <?= $service->name; ?></label>
                                           </div>
                                       <?php endforeach; ?>
                                       </div>
                                    </div>
                                <?php endif; ?>
               
                                
                                <!-- Textarea -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="comment">Comment</label>
                                        <textarea class="form-control" id="comments" name="comment" rows="5" placeholder="Write Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-block">Submit Quote</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- venue-admin -->
<!--                    <div class="vendor-owner-profile mb30">
                        <div class="vendor-owner-profile-head">
                            <div class="vendor-owner-profile-img"><img src="./images/admin-pic.jpg" class="rounded-circle" alt=""></div>
                            <small>Venue Owner</small>
                            <h4 class="vendor-owner-name">Roberto F. McGill</h4>
                        </div>
                        <div class="vendor-owner-profile-content">
                            <?php if($model->street): ?>
                                <p class="mb-2"><?= Yii::t('street', $model->street); ?></p>
                            <?php endif; ?>
                            <p class="mb10">(123) 123 4567</p>
                            <p class="text-default mb10">vendorname@yourdomain.com</p>
                            <a href="#" class="btn btn-primary">contact vendor</a>
                        </div>
                    </div>-->
                    <!-- /.venue-admin -->
                </div>
            </div>
        </div>
    </div>
</div>