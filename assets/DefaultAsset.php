<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
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
        '/themes/default/fontawesome/css/fontawesome-all.css',
        '/themes/default/fontello/css/fontello.css',
        '/themes/default/css/owl.carousel.css',
        '/themes/default/css/owl.theme.default.css',
        '/themes/default/css/style.css',
    ];
    public $js = [
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        "/themes/default/js/menumaker.min.js",
        "/themes/default/js/owl.carousel.min.js",
        "/themes/default/js/jquery.nice-select.min.js",
        "/themes/default/js/fastclick.js",
        "/themes/default/js/custom-script.js",
        "/themes/default/js/return-to-top.js",
    
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}