<?php

namespace app\modules\buisness;

/**
 * buisness module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\buisness\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        
        \Yii::$app->view->theme = new \yii\base\Theme([
            'pathMap' => ['@app/views' => '@app/themes/red/views'],
            'basePath' => '@web/themes/red',
        ]);
        // custom initialization code goes here
    }
}
