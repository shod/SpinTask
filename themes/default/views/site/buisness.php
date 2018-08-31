<?php

/* @var $this yii\web\View */

$this->title = 'Buisness page';


$this->params['breadcrumbs'][] = ['label' => 'buisness list', 'url' => ['/site/catalog']];
$this->params['breadcrumbs'][] = $model->name;

//  \app\models_ex\Company::getImageUrl() . $model->image; 
?>

<div class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <!--vendor-heading -->
                <div class="vendor-headings">
                    <h2 class="mb10"><?= $model->name; ?></h2>
                    <p class="vendor-address">3170 Stonecoal Road Napoleon, OH 43545. <a href="#" class="btn-secondary-link ml-2">View Map</a> </p>
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
                    <?= $this->render('_vendor_info'); ?>
                    
                    <div class="vendor-descriptions">
                            <h3 class="border-bottom mb20 pdb10">About Wedding Venue</h3>
                            <p>Duis vulputate ultrices odio, vitae tristique lectus dapibus sit amet. Vivamus iaculis sagittis libero, at mollis ante semper eu. Integer semper nisl ut nisi efficitur posuere. Suspendisse potenti. Nunc convallis risus libero, a aliquet odio pretium non. Curabitur at porta ex, eu pretium felis. Fusce mattis efficitur nisi, non pretium nulla luctus sit amet. </p>
                            <h4>Sub heading </h4>
                            <p>Donec accumsan consequat massa non gravida. Morbi pharetra mollis tortor ac maximus. Nunc dapibus bibendum urna, in egestas dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                        </div>
                        <!--vendor-description -->
                        <!--venue-highlights -->
                        <div class="venue-highlights">
                            <h3 class="border-bottom mb20 pdb10">Venue Highlights</h3>
                            <ul class="list-unstyled text-dark">
                                <li>
                                    <div>Maximum Capacity
                                        <div class="venue-highlight-meta">350</div>
                                    </div>
                                </li>
                                <li>
                                    <div>Guest Minimum
                                        <div class="venue-highlight-meta">40</div>
                                    </div>
                                </li>
                                <li>
                                    <div>Style
                                        <div class="venue-highlight-meta">Barn, Mansion, Winery</div>
                                    </div>
                                </li>
                                <li>
                                    <div>Event Spaces
                                        <div class="venue-highlight-meta">Outdoorsy, Rustic/Country, Unique</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.venue-highlights -->
                        <!-- aminities-block -->
                        <div class="amenities-block">
                            <h3 class="border-bottom mb20 pdb10">Accommodations / Amenities Included</h3>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="animities-list">
                                        <ul class="list-unstyled arrow">
                                            <li>Air conditioning</li>
                                            <li>Bathroom</li>
                                            <li>Hair Dryer</li>
                                            <li>Kitchen</li>
                                            <li>Linen supplied</li>
                                            <li>Non-smoking</li>
                                            <li>Open fireplace </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="animities-list">
                                        <ul class="list-unstyled arrow">
                                            <li> Parking</li>
                                            <li><strike>Pet-friendly</strike> </li>
                                            <li>Towels supplied </li>
                                            <li>TV</li>
                                            <li>Washing machine</li>
                                            <li>Wheelchair</li>
                                            <li>Access Wifi</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.aminities-block -->
                        <!-- review-block -->
                        <div id="reviews">
                            <h3 class="border-bottom mb20 pdb10">Reviews</h3>
                            <div class="review-block">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <!-- review-sidebar -->
                                        <div class="review-sidebar">
                                            <div class="review-box">
                                                <div class="review-total">4.8 </div>
                                                <div class="review-text">Reviews</div>
                                                <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa  fa-star"></i> <i class="fa fa-star"></i> </span>
                                            </div>
                                        </div>
                                        <!-- /.review-sidebar -->
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <!-- review-list -->
                                        <div class="review-list">
                                            <div class="review-for">Quality Service</div>
                                            <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far  fa-star"></i> </span></div>
                                            <div class="review-number">3.0</div>
                                        </div>
                                        <!-- /.review-list -->
                                        <!-- review-list -->
                                        <div class="review-list">
                                            <div class="review-for">Facilities</div>
                                            <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> </span></div>
                                            <div class="review-number">4.0</div>
                                        </div>
                                        <!-- /.review-list -->
                                        <!-- review-list -->
                                        <div class="review-list">
                                            <div class="review-for">Staff</div>
                                            <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </span></div>
                                            <div class="review-number">3.0</div>
                                        </div>
                                        <!-- /.review-list -->
                                        <!-- review-list -->
                                        <div class="review-list">
                                            <div class="review-for">Flexibility</div>
                                            <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> </span></div>
                                            <div class="review-number">3.0</div>
                                        </div>
                                        <!-- /.review-list -->
                                        <!-- review-list -->
                                        <div class="review-list">
                                            <div class="review-for">Value of money</div>
                                            <div class="review-rating"><span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i> </span></div>
                                            <div class="review-number">4.0</div>
                                        </div>
                                        <!-- /.review-list -->
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mt40">
                                        <a href="#" class="btn btn-default">write a review</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.review-block -->
                        <!-- /.review-content -->
                       
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                <div class="sidebar-venue">
                    <div class="well-box-dark">
                        <form>
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
                                        <label class=" control-label sr-only" for="email">Email</label>
                                        <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class=" control-label sr-only" for="phone">Phone</label>
                                        <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="weddingdate">Wedding Date</label>
                                        <input id="weddingdate" name="weddingdate" type="text" placeholder="Wedding Date" class="form-control input-md" required="">
                                        <div class="venue-form-calendar"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                                <!-- Textarea -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="comments">Comment</label>
                                        <textarea class="form-control" id="comments" name="comments" rows="5" placeholder="Write Comment"></textarea>
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
                    <div class="vendor-owner-profile mb30">
                        <div class="vendor-owner-profile-head">
                            <div class="vendor-owner-profile-img"><img src="./images/admin-pic.jpg" class="rounded-circle" alt=""></div>
                            <small>Venue Owner</small>
                            <h4 class="vendor-owner-name">Roberto F. McGill</h4>
                        </div>
                        <div class="vendor-owner-profile-content">
                            <p class="mb-2">1847 Providence Lane
                                <br> Alhambra, CA 91801</p>
                            <p class="mb10">(123) 123 4567</p>
                            <p class="text-default mb10">vendorname@yourdomain.com</p>
                            <a href="#" class="btn btn-primary">contact vendor</a>
                        </div>
                    </div>
                    <!-- /.venue-admin -->
                    <!-- social-media -->
                    <div class="mb30">
                        <h4 class="widget-title">Stay in Touch </h4>
                        <div class="social-icons">
                            <a href="#" class="icon-square-outline facebook-outline"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="icon-square-outline twitter-outline"><i class="fab fa-twitter"></i> </a>
                            <a href="#" class="icon-square-outline googleplus-outline"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="icon-square-outline instagram-outline"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <!-- /.social-media -->
                </div>
            </div>
        </div>
    </div>
</div>