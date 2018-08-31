<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Main page';

?>


<div class="hero-section">
     <div class="container">
         <div class="row">
             <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 col-md-12 col-sm-12 col-12">
                 <!-- search-block -->
                 <div class="search-block">
                     <div class="text-center search-head">
                         <h1 class="search-head-title">Find Local Wedding Vendors</h1>
                         <p class="d-none d-xl-block d-lg-block d-sm-block">Browse the best wedding vendors in your area — from venues and photographers, to wedding planners, caterers, florists and more.</p>
                     </div>
                     <!-- /.search-block -->
                     <!-- search-form -->
                     <div class="search-form">
                         <form class="" action="<?= yii\helpers\Url::to(['/site/catalog/',]) ?>">
                             <div class="row">
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                     <!-- select -->
                                     <select class="wide">
                                         <option value="Venue Type">Venue Type</option>
                                         <option value="Hotel">Hotel</option>
                                         <option value="Restaurant">Restaurant</option>
                                         <option value="Castle">Castle</option>
                                         <option value="Barns">Barns</option>
                                         <option value="Resort">Resort</option>
                                         <option value="Church">Church</option>
                                         <option value="In Door">In Door</option>
                                     </select>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                     <!-- select -->
                                     <select class="wide">
                                         <option value="Ahmedabad" data-display="Ahmedabad">Ahmedabad</option>
                                         <option value="Surat">Surat</option>
                                         <option value="Rajkot">Rajkot</option>
                                         <option value="Vadodara">Vadodara</option>
                                         <option value="Vapi">Vapi</option>
                                         <option value="Bhavnagar">Bhavnagar</option>
                                     </select>
                                 </div>
                                 <!-- button -->
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                     <button class="btn btn-default btn-block" type="submit">Find Venue</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <!-- /.search-form -->
                 </div>
             </div>
         </div>
     </div>
 </div>

 <p>
            <?= Html::a('Admin', ['/admin/',], ['class' => 'btn btn-success']) ?>
        </p>
        <p>
            <?= Html::a('Catalog', ['/site/catalog/',], ['class' => 'btn btn-success']) ?>
        </p>