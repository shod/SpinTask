<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>B2B.migom.by <?= Html::encode($this->title) ?></title>
    <style>
        @media only screen and (max-width: 780px) {
            a:not(.btn-danger) > .ks-action {
                color: #25628f;
            }
            a:not(.btn-danger) > .ks-description{
                color: #8997c3;
            }
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-white"> <!-- remove ks-page-header-fixed to unfix header -->
<!-- remove ks-page-header-fixed to unfix header -->

<?php $this->beginBody() ?>


<!-- BEGIN HEADER -->
<nav class="navbar ks-navbar">
    <!-- BEGIN HEADER INNER -->
    <!-- BEGIN LOGO -->
    <div href="index.html" class="navbar-brand">
        <!-- BEGIN RESPONSIVE SIDEBAR TOGGLER -->
        <a href="#" class="ks-sidebar-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <a href="#" class="ks-sidebar-mobile-toggle"><i class="ks-icon la la-bars" aria-hidden="true"></i></a>
        <!-- END RESPONSIVE SIDEBAR TOGGLER -->

        <div class="ks-navbar-logo">
            <a href="/" class="ks-logo"><?= Yii::$app->name ?></a>
        </div>
    </div>
    <!-- END LOGO -->

    <!-- BEGIN MENUS -->
    <div class="ks-wrapper">

        <!-- BEGIN NAVBAR ACTIONS TOGGLER -->
        <nav class="nav navbar-nav ks-navbar-actions-toggle">
            <a class="nav-item nav-link" href="#">
                <span class="la la-info la-2x ks-icon ks-open"></span>
                <span class="la la-close ks-icon ks-close"></span>
            </a>
        </nav>
        <!-- END NAVBAR ACTIONS TOGGLER -->

    </div>
    <!-- END MENUS -->
    <!-- END HEADER INNER -->
</nav>
<!-- END HEADER -->






<div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs">

   

    <div class="ks-column ks-page">
        <div class="ks-page-header" style="display: contents;">
            <section class="ks-title-and-subtitle">
                <div class="ks-title-block">
                    <h1 class="ks-main-title"><?= Html::encode($this->title) ?></h1>
                </div>
            </section>
            <section class="ks-title-and-subtitle">
                <div class="ks-title-block">
                    <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]); ?>
                </div>
            </section>
        </div>

        <div class="ks-page-content"  style="margin-top:25px;     padding: 0 30px;">
                <?= $content;?>
        </div>
    </div>
</div>
<div id="modal-div"></div>


<div class="ks-mobile-overlay"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
