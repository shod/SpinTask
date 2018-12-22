<?php

namespace app\controllers;

use app\helpers\SysService;
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
    public function actionIndex() {

        $regions = $this->getRegionByCountry();

        return $this->render('index', ['regions' => $regions, /* 'city' => $city */]);
    }

    public function actionPage($id)
    {
        $model = \app\models\Texts::findOne($id);
        $vars = ['model' => $model];
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
    public function actionBuisness($id = 0)
    {
        if(!$id){
            $id = \Yii::$app->request->get('company_id');
        }
        $model = \app\models\Company::findOne($id);
        
        $companyService = \app\models\CompanyService::find()->where(['company_id' => $id])->all();
        
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
        $model->params = \yii\helpers\Json::encode($_GET['params']);
        $model->company_id = $id;
        
        $check = \app\models\Quote::find()->where(['company_id' => $model->company_id, 'phone' => $model->phone])->count();
        if(!$check){
            SysService::sendEmail($_GET['email'], 'You have made new request', Yii::$app->params['email_from'],false, 'simple', array_merge($_GET['params'], ['name' => $_GET['name']]) );
            SysService::sendEmail($company->email, 'New Request', Yii::$app->params['email_from'],false, 'simple-owner', array_merge($_GET['params'], ['name' => $_GET['name']]) );
            $model->save();
        }
        
        return $this->render('quote_result', ['model' => $model, "message" => $message]);
    }
    
    public function actionCatalog()
    {
        $city_id = (int) \Yii::$app->request->get('city_id');
        dd($city_id);
        $query = \app\models\Company::find();
        if(\Yii::$app->request->seo){
            $service_property_value_id = (int) \Yii::$app->request->get('service_property_value_id');
            if($service_property_value_id){
                $query->joinWith(['companyServiceValues'])->where(['service_property_value_id' => $service_property_value_id]);
            }
            /*if($city_id){
                $query->andWhere(['city_id' => $city_id]);
            }*/
        }
        
        if($city_id){
            $query->andWhere(['city_id' => $city_id]);
        }


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $regions = $this->getRegionByCountry();
        
        $region_id = (int) \Yii::$app->request->get('region');
        $city = $this->getCityByRegion($region_id);
        
        $service = \app\models\Service::find()->all();
        
        
        $filters = \app\models\SeoFilter::find()->with(['seo'])->all();
        
        return $this->render('catalog', [
            'dataProvider' => $dataProvider,
            'regions' => $regions,
            'city' => $city,
            'service' => $service,
            'filters' => $filters,
        ]);
    }
    
    private function getCityByRegion($region_id) {
        return \app\models\City::find()->innerJoinWith('companies', false)->where(['region_id' => $region_id,])->orderBy('name')->all();
    }
    
    private function getRegionByCountry() {
        return \app\models\Region::find()->innerJoinWith('companies', false)->where(['country_id' => \Yii::$app->params['country']])->all();
    }
}
