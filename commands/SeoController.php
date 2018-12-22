<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

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
        lower( t2.VALUE ) AS name1,
        lower( s.NAME ) AS name2,
        city_id,
        ci.region_id,
        lower( ci.name ) as city,
        lower( r.name ) as region  
        
    FROM
        `company_service_value` t1
        JOIN service_property_value t2 ON t1.service_property_value_id = t2.id
        JOIN company_service cs ON cs.id = t1.company_service_id 
        JOIN service s ON s.id = t2.service_id
        JOIN company c ON c.id = cs.company_id
        JOIN city ci ON ci.id = c.city_id
        JOIN region r ON r.id = ci.region_id 
    WHERE
        `service_property_id` = '17'";

        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($data as $key => $value) {
            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl( 'catalog/' . $value['name1'] . '/' . $value['name2']);
            $model->controller = 'site/catalog';
            $model->h1 = $value['name1'] . ' ' . $value['name2'];
            $model->parms = \json_encode(['service_property_value_id' => $value['id'], 'service_id' => $value['service_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
             //   die;
            }
            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl($value['region'] . '/' . $value['city'] . '/catalog/' . $value['name1'] . '/' . $value['name2']);
            $model->controller = 'site/catalog';
            $model->h1 = $value['name1'] . ' ' . $value['name2'] . ' ' . $value['region'] . ' ' . $value['city'];
            $model->parms = \json_encode(['service_property_value_id' => $value['id'], 'service_id' => $value['service_id'],
                'city_id' => $value['city_id'], 'region_id' => $value['region_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
               // die;
            }

            //TOOLS
            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl('catalog/' . $value['name1']);
            $model->controller = 'site/catalog';
            $model->h1 = $value['name1'];
            $model->parms = \json_encode(['service_property_value_id' => $value['id'],]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
               // die;
            }

            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl($value['region'] . '/' . $value['city'] . '/catalog/' . $value['name1']);
            $model->controller = 'site/catalog';
            $model->h1 = $value['name1'] . ' ' . $value['region'] . ' ' . $value['city'];
            $model->parms = \json_encode(['service_property_value_id' => $value['id'], 
                'city_id' => $value['city_id'], 'region_id' => $value['region_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
               // die;
            }

            //SERVICE
            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl('catalog/' . $value['name2']);
            $model->controller = 'site/catalog';
            $model->h1 = $value['name1'];
            $model->parms = \json_encode(['service_id' => $value['service_id'],]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
               // die;
            }

            $model = new \app\models\SeoPattern();
            $model->url = $this->formatUrl($value['region'] . '/' . $value['city'] . '/catalog/' . $value['name2']);
            $model->controller = 'site/catalog';
            $model->h1 = $value['name2'] . ' ' . $value['region'] . ' ' . $value['city'];
            $model->parms = \json_encode(['service_id' => $value['service_id'], 
                'city_id' => $value['city_id'], 'region_id' => $value['region_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
               // die;
            }
        }

        $this->company();
        return ExitCode::OK;
    }

    private function company(){
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
            $model->url = $this->formatUrl($value['region'].'/'.$value['city'].'/'.$value['buisnes']);
            $model->controller = 'site/buisness';
            $model->h1 = $value['buisnes'];
            $model->parms = \json_encode(['company_id' => $value['id'], 'region_id' => $value['region_id'], 'city_id' => $value['city_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
                die;
            }
        }
    }

    private function formatUrl($url) : string {
        $url = preg_replace('/[^\/ a-z]/u', '', $url );
        $url = str_replace(['  ',' '], [' ','-'],$url);
        return $url;
    }

}
