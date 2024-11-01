<?php

namespace app\controllers;

use app\helpers\SysService;
use Yii;
use app\components\yii\web\Controller; //app\components\yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Industry;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

class CatalogController extends Controller
{


    public function behaviors()
    {
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

    public function actionCity($region_id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $city = $this->getCityByRegion($region_id);
        $data = [];
        foreach ($city as $c) {
            $data[$c->id] = $c->name;
        }
        return $this->asJson($data);
    }



    public function actionIndex()
    {
        $industry_id = 0;
        $city_id = (int) \Yii::$app->request->get('city_id');

        $query = \app\models\Company::find();
        $query->andWhere(['is_active' => 1]);

        $seo_pattern = \Yii::$app->request->seo;

        if ($seo_pattern->parms != null) {
            $industry_id = $this->getIndustryId(\Yii::$app->request->seo);

            $service_property_value_id = (int) \Yii::$app->request->get('service_property_value_id');
            if ($service_property_value_id) {
                $query->joinWith(['companyServiceValues'])->where(['service_property_value_id' => $service_property_value_id]);
            }
            /*if($city_id){
                $query->andWhere(['city_id' => $city_id]);
            }*/
        } else {
            $industry_id = (int) \Yii::$app->request->get('industry_id');
        }

        if (!\Yii::$app->request->seo->id) {
            \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => 'YachtService.vip - The Search Filter',]);
        }

        if ($city_id) {
            $query->andWhere(['city_id' => $city_id]);
        }

        $region_id = (int) \Yii::$app->request->get('region_id');
        if ($region_id) {

            $query->andWhere(['state_id' => $region_id]);
        }

        $service_id = (int) \Yii::$app->request->get('service_id');
        if ($service_id) {

            $query->joinWith(['companyServiceValues'])->andWhere(['service_id' => $service_id]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        //dd($dataProvider->getTotalCount()); exit;
        $regions = $this->getRegionByCountry();

        $city = $this->getCityByRegion($region_id);
        //$service = \app\models\Service::find()->all();        
        $service = \app\models\Service::findAll(['industry_id' => $industry_id]);
        /*Top service values*/
        //$companyTopServiceValue = $model->getCompanyTopServiceValues();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'regions' => $regions,
            'city' => $city,
            'service' => $service,
            'filters' => $this->getFilters(),
            'tools' => $this->getTools(),
        ]);
    }

    private function getIndustryId($seoPatternModel)
    {
        $parms = \yii\helpers\Json::decode($seoPatternModel->parms, TRUE);
        return $parms['industry_id'];
    }

    private function getCityByRegion($region_id)
    {
        return \app\models\City::find()->innerJoinWith('companies', false)->where(['region_id' => $region_id,])->orderBy('name')->all();
    }

    private function getRegionByCountry()
    {
        return \app\models\Region::find()->innerJoinWith('companies', false)->where(['country_id' => \Yii::$app->params['country']])->all();
    }

    private function getTools()
    {
        $sql = "SELECT DISTINCT
                    spv.id, spv.value as name
                FROM
                    `service_property_value` spv
                    inner join company_service_value csv on csv.service_property_value_id = spv.id
                WHERE
                    `service_property_id` = '21' ";
        $filters = Yii::$app->db->createCommand($sql)->queryAll();
        return $filters;
    }

    private function getFilters()
    {
        $seoUrl = Yii::$app->request->seo->url;

        $region_id = Yii::$app->request->get('region_id');
        $city_id = Yii::$app->request->get('city_id');

        $sql = "SELECT * FROM `seo_pattern` WHERE  `url` LIKE '{$seoUrl}/%' AND `url` NOT LIKE '{$seoUrl}/%/%' ";
        if ($city_id) {
            //not added filters
        } elseif ($region_id) {
            $sql .= "and `parms` not like '%city_id%'";
        } else {
            $sql .= "and `parms` not like '%region%'";
        }

        $filters = Yii::$app->db->createCommand($sql)->queryAll();
        return $filters;
    }
}
