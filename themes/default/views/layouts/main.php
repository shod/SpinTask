<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DefaultAsset;

DefaultAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html  lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name ?> - <?= Html::encode($this->title) ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/themes/default/images/favicon.ico">
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
                    <!-- header-logo -->
                    <div class="header-logo">
                        <a href="index.html"><img src="/themes/default/images/logo.png" alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                    </div>
                    <!-- /.header-logo -->
                </div>
                <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 col-12">
                    <!-- navigations -->
                     <div id="navigation">
                        <ul>
                            <li><a href="#" title="#">Homepages</a>
                                <ul>
                                    <li><a href="index.html" title="">Homepage 1</a></li>
                                    <li><a href="index-2.html" title="">Homepage 2</a></li>
                                </ul>
                            </li>
                            <li><a href="#" title="#">Venue</a>
                                <ul>
                                    <li><a href="#" title="">Listing</a>
                                        <ul>
                                            <li><a href="list-grid-view.html" title="">List Grid View</a></li>
                                            <li><a href="list-view-sidebar.html" title="">List View Sidebar</a></li>
                                            <li><a href="list-half-screen-map.html" title="">List Half Screen Map</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" title="">List Single</a>
                                        <ul>
                                            <li><a href="list-single-1.html" title="">List Single 1</a></li>
                                            <li><a href="list-single-2.html" title="">List Single 2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" title="#">Real Weddings</a>
                                <ul>
                                    <li><a href="real-wedding-list.html" title="">Real Weddings List</a></li>
                                    <li><a href="real-wedding-single.html" title="">Real Weddings Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#" title="#">Blog</a>
                                <ul>
                                    <li><a href="blog-listing.html" title="">Blog Listing</a></li>
                                    <li><a href="blog-single.html" title="">Blog Single</a></li>
                                </ul>
                            </li>
                                <li><a href="#" title="#">Features</a>
                                <ul>
                                    <li><a href="" title="">Pages</a>
                                        <ul>
                                            <li><a href="about-us.html" title="">About us</a></li>
                                            <li><a href="pricing.html" title="">Pricing</a></li>
                                            <li><a href="error-404.html" title="">404</a></li>
                                            <li><a href="faq.html" title="">FAQ's</a></li>
                                            <li><a href="contact-us.html" title="">Contact us</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="" title="">Forms</a>
                                        <ul>
                                            <li><a href="vendor-form.html" title="">Vendors Form</a></li>
                                            <li><a href="couple-form.html" title="">Couple Form</a></li>
                                            <li><a href="forgot-password.html" title="">Forgot Password</a></li>
                                        </ul>
                                    </li>
                                      <li><a href="" title="">Help Center</a>
                                        <ul>
                                            <li><a href="help-center.html" title="">Help Center</a></li>
                                            <li><a href="help-category-list.html" title="">Help Category List</a></li>
                                            <li><a href="help-category-single.html" title="">Help Category Single</a></li>
                                        
                                        </ul>
                                    </li>
                                    <li><a href="" title="">Email Templates</a>
                                        <ul>                                          
                                            <li><a href="email-template/new-id-password.html" title="">New ID/Password</a></li>
                                            <li><a href="email-template/reset-password.html" title="">Reset Password</a></li>
                                            <li><a href="email-template/forgot-password.html" title="">Forgot Password</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="" title="">Shortcodes</a>
                                        <ul>
                                            <li><a href="shortcode-accordions.html" title="">Accordions</a></li>
                                            <li><a href="shortcode-tabs.html" title="">Tabs</a></li>
                                            <li><a href="shortcode-alerts.html" title="">Alerts</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" title="">User Panel</a>
                                <ul>
                                    <li><a href="#" title="">Vendor Dashboard</a>
                                        <ul>
                                            <li><a href="vendor-dashboard-overview.html" title="">Dashboard</a></li>
                                            <li><a href="vendor-dashboard-listing.html" title="">Listing</a></li>
                                            <li><a href="vendor-dashboard-add-listing.html" title="">Add Listing</a></li>
                                            <li><a href="vendor-dashboard-pricing.html" title="">Pricing</a></li>
                                            <li><a href="vendor-dashboard-request-quote.html" title="">Request Quote</a></li>
                                            <li><a href="vendor-dashboard-reviews.html" title="">Reviews</a></li>
                                            <li><a href="vendor-dashboard-profile.html" title="">   Profile</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" title="">Couple Dashboard</a>
                                        <ul>
                                            <li><a href="couple-dashboard-overview.html" title="">Dashboard</a></li>
                                            <li><a href="couple-dashboard-mywishlist.html" title="">My Listing</a></li>
                                            <li><a href="couple-dashboard-todolist" title="">To Do List</a></li>
                                            <li><a href="couple-dashboard-budget.html" title="">Budget</a></li>
                                            <li><a href="couple-dashboard-guest-manager.html" title="">Guest Manager</a></li>
                                            <li><a href="couple-dashboard-add-new-guest.html" title="">Add New Guest</a></li>
                                            <li><a href="couple-dashboard-table-planner.html" title="">Seating Table</a></li>
                                            <li><a href="couple-dashboard-profile.html" title="">   Profile</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navigations -->
                </div>
                <div class="col-xl-3 col-lg-2 text-right col-md-2 col-sm-12 col-12 d-none d-xl-block d-lg-block">
                    <!-- header-btn -->
                    <div class="header-btn">
                        <a href="couple-form.html" class="btn btn-default btn-sm">Login</a>
                    </div>
                    <!-- /.header-btn -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.header -->
    <!-- hero-section -->
    <?= $content; ?>
    <!-- /.hero-section -->
    <!-- feature-section -->


    <!-- footer-section -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <!-- footer-widget -->
                    <div class="footer-widget">
                        <a href="#"><img src="/themes/default/images/footer-logo.png" alt="" class="mb20"></a>
                        <p class="mb10">Vestibulum ante elit, convallis quis nibh in, vulputate rhoncus massa. In hac habitasse platea dictumst.</p>
                        <p>In hac habitasse platea dictumst simple dummy content here.</p>
                    </div>
                </div>
                <!-- /.footer-widget -->
                <!-- footer-widget -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title">
                            Contact Address
                        </h3>
                        <p>4998 Elk Creek Road Canton,
                            <br> GA 30114</p>
                        <p class="mb0 text-default">+0-800-1234-123</p>
                        <p class="mb0 text-default">info@realwed.com</p>
                    </div>
                </div>
                <!-- /.footer-widget -->
                <!-- footer-widget -->
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title">
                            About Company
                        </h3>
                        <ul class="listnone">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Pricing Plan</a></li>
                            <li><a href="#">Meet The Team</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.footer-widget -->
                <!-- /.footer-widget -->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-6 col-12">
                    <div class="footer-widget">
                        <h3 class="widget-title">
                            List you Business
                        </h3>
                        <p>Are you vendor ? List your venue and service get more from listing business.</p>
                        <a href="#" class="btn btn-default">List your Business</a>
                    </div>
                </div>
                <!-- /.footer-widget -->
            </div>
        </div>
    </div>
    <!-- tiny-footer-section -->
    <div class="tiny-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right">
                    <p>© 2018 RealWed. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.tiny-footer-section -->
      <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
