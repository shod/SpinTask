<?php

/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DefaultAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/default';
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        //'libs/bootstrap/css/bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i',
        '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'https://www.static.yachtservice.vip/themes/default/fontawesome/css/fontawesome-all.css',
        'https://www.static.yachtservice.vip/themes/default/fontello/css/fontello.css',
        'https://www.static.yachtservice.vip/themes/default/css/owl.carousel.css',
        'https://www.static.yachtservice.vip/themes/default/css/owl.theme.default.css',
        'https://www.static.yachtservice.vip/themes/default/css/style.css?v=3',
    ];
    public $js = [
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        "https://www.static.yachtservice.vip/themes/default/js/menumaker.min.js",
        "https://www.static.yachtservice.vip/themes/default/js/owl.carousel.min.js",
        "https://www.static.yachtservice.vip/themes/default/js/jquery.nice-select.min.js",
        "https://www.static.yachtservice.vip/themes/default/js/fastclick.js",
        "https://www.static.yachtservice.vip/themes/default/js/custom-script.js",
        "https://www.static.yachtservice.vip/themes/default/js/return-to-top.js",

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
