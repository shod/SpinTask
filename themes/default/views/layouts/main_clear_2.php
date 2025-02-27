<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\VarDumper;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
app\assets\AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo Html::encode($this->title); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?= \Yii::$app->params['cdn_url'] ?>/catalog/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= \Yii::$app->params['cdn_url'] ?>/catalog/assets/fonts/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= \Yii::$app->params['cdn_url'] ?>/assets/fonts/open-sans/styles.css">
    <link rel="stylesheet" type="text/css" href="<?= \Yii::$app->params['cdn_url'] ?>/libs/tether/css/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?= \Yii::$app->params['cdn_url'] ?>/assets/styles/common.min.css">
    <link rel="stylesheet" type="text/css" href="<?= \Yii::$app->params['cdn_url'] ?>/assets/styles/pages/auth.min.css">

</head>


<body>


    <?= $content; ?>


    <script src="<?= \Yii::$app->params['cdn_url'] ?>/libs/jquery/jquery.min.js"></script>
    <script src="<?= \Yii::$app->params['cdn_url'] ?>/libs/tether/js/tether.min.js"></script>
    <script src="<?= \Yii::$app->params['cdn_url'] ?>/libs/bootstrap/js/bootstrap.min.js"></script>

</body>



</html>