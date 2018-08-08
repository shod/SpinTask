<?php

namespace app\controllers;

use Yii;
use app\components\yii\web\Controller; //app\components\yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    
    public function actionLogin()
	{
		$this->layout = 'main_clear_2';
		$model = new LoginForm();
		if ($model->load($_POST) && $model->login()) {
			return $this->goBack();
		}
		else {
			return $this->render('login', array(
				'model' => $model,
			));
		}
	}

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
     /**
     * Displays about page.
     *
     * @return string
     */
    public function actionBuisness($id)
    {
        $model = \app\models\Company::findOne($id);
        
        $companyService = \app\models\CompanyService::find()->where(['company_id' => $id])->all();
        return $this->render('buisness', ['model' => $model, 'companyService' => $companyService]);
    }
    
    public function actionCatalog()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => \app\models\Company::find(),
        ]);

        return $this->render('catalog', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
