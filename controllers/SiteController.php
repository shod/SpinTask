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
        
        $regions = $this->getRegionByCountry();
        //$city = \app\models\City::find()->where(['region_id' => 1,])->orderBy('name')->all();
        
        return $this->render('index', ['regions' => $regions, /*'city' => $city*/]);
    }
    
    public function actionPage($id)
    {
        $model = \app\models\Texts::findOne($id);
        $vars = ['model' => $model];
        /*$seo_model = Yii::$app->request->seo;
        
        if($text_id){
            $vars = $this->_get_page_type_text($text_id);                                                
        }else{
            $id = Yii::$app->request->get('pm');
            $vars = $this->_get_page_type_sys($id);
        }
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $seo_model['keyword'],           
        ]);

        \Yii::$app->view->registerMetaTag([            
            'name' => 'description',
            'content' => $seo_model['description'],            
        ]);
        $vars['meta_title'] = $seo_model['title'];  */      
        return $this->render('page', $vars);
    }
    
    public function actionCity($region_id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $city = $this->getCityByRegion($region_id);
        $data = [];
        foreach ($city as $c){
            $data[$c->id] = $c->name;
        }
        return $this->asJson($data);
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
        
        $metainfo = \app\components\SeoTextService::getMetaInfo();
        return $this->render('buisness', ['model' => $model, 'companyService' => $companyService]);
    }
    
  
    
    public function actionQuote($id)
    {
        $company = \app\models\Company::findOne($id);
        if(!$company){
            
        }
        
        $message = 'Request accepted. In the near future contact with you.';
        
        $model = new \app\models\Quote();
        $model->attributes = $_GET;
        $model->company_id = $id;
        
        $check = \app\models\Quote::find()->where(['company_id' => $model->company_id, 'phone' => $model->phone])->count();
        if(!$check){
            $model->save();
        }
        
        return $this->render('quote_result', ['model' => $model, "message" => $message]);
    }
    
    public function actionCatalog()
    {
        $city_id = (int) \Yii::$app->request->get('city');
        
        $dataProvider = new ActiveDataProvider([
            'query' => \app\models\Company::find()->where(['city_id' => $city_id]),
        ]);
        $regions = $this->getRegionByCountry();
        
        $region_id = (int) \Yii::$app->request->get('region');
        $city = $this->getCityByRegion($region_id);
        
        $service = \app\models\Service::find()->all();
        
        $metainfo = \app\components\SeoTextService::getMetaIfno();
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $metainfo['keyword'],           
        ]);
         
        \Yii::$app->view->registerMetaTag([            
            'name' => 'description',
            'content' => $metainfo['description'],            
        ]);
        
        
        
        
        return $this->render('catalog', [
            'dataProvider' => $dataProvider,
            'regions' => $regions,
            'city' => $city,
            'service' => $service,
            'meta_title' => $metainfo['title'],    
        ]);
    }
    
    private function getCityByRegion($region_id) {
        return \app\models\City::find()->where(['region_id' => $region_id,])->orderBy('name')->all();
        
    }
    
    private function getRegionByCountry() {
        return \app\models\Region::find()->where(['country_id' => \Yii::$app->params['country']])->all();
        
    }
}
