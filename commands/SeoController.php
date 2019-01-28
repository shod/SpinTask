<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\components\SeoRule;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SeoController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionPattern()
    {
        $sql = "SELECT DISTINCT
        t2.id,
        t2.service_id,
        s.industry_id,
        lower( t2.VALUE ) AS tool,

        city_id,
        ci.region_id,
        lower( s.NAME ) AS servicename,
        lower( ci.name ) as city,
        lower( i.name ) as industry,
        lower( r.name ) as region

    FROM
        `company_service_value` t1
        JOIN service_property_value t2 ON t1.service_property_value_id = t2.id
        JOIN company_service cs ON cs.id = t1.company_service_id
        JOIN service s ON s.id = t2.service_id
        join Industry i ON i.id = s.industry_id
        JOIN company c ON c.id = cs.company_id
        JOIN city ci ON ci.id = c.city_id
        JOIN region r ON r.id = ci.region_id
    WHERE
        `service_property_id` = '17'";

        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($data as $key => $value) {

            $this->createIndustryRegionCity($value,
                $value['tool'] . '/' . $value['servicename'], 
                $value['tool'] . ' ' . $value['servicename'], 
                ['service_property_value_id' => $value['id'], 'service_id' => $value['service_id']]
            );

            $this->createIndustryRegionCity($value,
                $value['tool'], 
                $value['tool'], 
                ['service_property_value_id' => $value['id'],]
            );

            $this->createIndustryRegionCity($value,
                $value['servicename'], 
                $value['industry'] . ' ' . $value['servicename'], 
                ['service_property_value_id' => $value['id'],]
            );
        }

        $this->company();
        $this->region();
        return ExitCode::OK;
    }

    private function createIndustryRegionCity($value, $url, $h1, $params)
    {
        $model = new \app\models\SeoPattern();
        $model->controller = 'catalog/index';
        $model->url = $this->formatUrl($value['industry'] . '/' . $url); //$value['tool'] . '/' . $value['servicename']);
        $model->h1 = $h1; //$value['tool'] . ' ' . $value['servicename'];
        $model->parms = SeoRule::paramsFormating(array_merge(['industry_id' => $value['industry_id']], $params)); // 'service_property_value_id' => $value['id'], 'service_id' => $value['service_id']]);
        try {
            $model->save();
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
        }

        $model = new \app\models\SeoPattern();
        $model->controller = 'catalog/index';
        $model->url = $this->formatUrl($value['industry'] . '/' . $value['region'] . '/' . $url);
        $model->h1 = $h1 . ' ' . $value['region'];
        $model->parms = SeoRule::paramsFormating(array_merge(['industry_id' => $value['industry_id'], 'region_id' => $value['region_id'],], $params));
   
        try {
            $model->save();
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
        }

        $model = new \app\models\SeoPattern();
        $model->controller = 'catalog/index';
        $model->url = $this->formatUrl($value['industry'] . '/' . $value['region'] . '/' . $value['city'] . '/' . $url);
        $model->h1 = $h1 . ' ' . $value['region'] . ' ' . $value['city'];
        $model->parms = SeoRule::paramsFormating(array_merge(['industry_id' => $value['industry_id'], 'region_id' => $value['region_id'],'city_id' => $value['city_id'], ], $params));
 
        try {
            $model->save();
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
        }
    }

    private function company()
    {
        $sql = "SELECT
            c.id,
            lower( c.NAME ) AS buisnes,
            city_id,
            ci.region_id,
            lower( ci.name ) as city,
            lower( r.name ) as region
        FROM
            `company` c
            JOIN city ci ON ci.id = c.city_id
            join region r ON r.id = ci.region_id";

        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($data as $key => $value) {
            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl($value['region'] . '/' . $value['city'] . '/' . $value['buisnes']);
            $model->controller = 'site/buisness';
            $model->h1 = $value['buisnes'];
            $model->parms = SeoRule::paramsFormating(['company_id' => $value['id'], 'region_id' => $value['region_id'], 'city_id' => $value['city_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
                die;
            }
        }
    }

    private function region()
    {
        $sql = "SELECT
                s.industry_id,
                city_id,
                ci.region_id,
                lower( ci.name ) as city,
                lower( i.name ) as industry,
                lower( r.name ) as region
            FROM
                `company` c
                join company_service cs ON cs.company_id = c.id
                join service s ON s.id = cs.service_id
                join Industry i ON i.id = s.industry_id
                JOIN city ci ON ci.id = c.city_id
                join region r ON r.id = ci.region_id";

        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($data as $key => $value) {

            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl($value['industry']);
            $model->controller = 'catalog/index';
            $model->h1 = $value['industry'];
            $model->type = 2;
            $model->parms = SeoRule::paramsFormating(['industry_id' => $value['industry_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
                die;
            }

            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl($value['industry'] . '/' . $value['region']);
            $model->controller = 'catalog/index';
            $model->h1 = $value['industry'] . ' in ' . $value['region'];
            $model->type = 3;
            $model->parms = SeoRule::paramsFormating(['industry_id' => $value['industry_id'], 'region_id' => $value['region_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
                die;
            }

            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl($value['industry'] . '/' . $value['region'] . '/' . $value['city']);
            $model->controller = 'catalog/index';
            $model->h1 = $value['industry'] . ' in ' . $value['region'] . ' ' . $value['city'];
            $model->parms = SeoRule::paramsFormating(['industry_id' => $value['industry_id'], 'region_id' => $value['region_id'], 'city_id' => $value['city_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
                die;
            }
        }
    }

    private function formatUrl($url): string
    {
        $url = preg_replace('/[^\/ a-z]/u', '', $url);
        $url = str_replace(['  ', ' '], [' ', '-'], $url);
        return $url;
    }

}
