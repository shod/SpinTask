<?php

namespace app\controllers;

use app\helpers\SysService;
use Yii;
use app\components\yii\web\Controller; //app\components\yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Service;
use app\models\Industry;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

class SitemapController extends Controller
{
    

    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        //'actions' => ['index', 'logout'],
                        'allow' => true,
                       // 'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }
    
    /**
    * Displays homepage.
    *
    * @return string
    */
    public function actionIndex() {

        $title = 'Sitemap';

       // $model = new \app\models\Service();
        
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('page', ['title' => $title, 'dataProvider' => $dataProvider]);
    }

    /**
    * Displays homepage.
    *
    * @return string
    */
    public function actionService($id) {

        $title = 'Sitemap - Service';

       // $model = new \app\models\Service();
        
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('page', ['title' => $title, 'dataProvider' => $dataProvider]);
    }

}
