<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components\yii\web;

/**
 * Контроллер для всех контроллеров
 *
 * @author Schemelev E. <schevgeny@gmail.com>
 */
class Controller extends \yii\web\Controller {

    /*public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        //'actions' => ['index', 'logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }*/


    /**
     * {@inheritdoc}
     */
    /*public function behaviors(){
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['login', 'logout',],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }*/
   
    /*
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    */

    
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            // If you want to change it only in one or few actions, add additional check

            \Yii::$app->user->loginUrl = ['site/login'];

            return true;
        } else {
            return false;
        }
        //if ( \Yii::$app->user->isGuest )
        //    return \Yii::$app->getResponse()->redirect(\yii\helpers\Url::to(['site/login']),302);
        return true;
    }

    

}
