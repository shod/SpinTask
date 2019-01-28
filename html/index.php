<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
error_reporting(E_ALL);
ini_set('display_errors', 1);

function dd($v){
  
    /*if(!in_array($_SERVER["HTTP_CF_CONNECTING_IP"], ['86.57.147.222'])){
        return false;
    }*/
    echo '<pre>';
    var_dump($v);
    echo '</pre>';
}

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
