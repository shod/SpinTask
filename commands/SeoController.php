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
        $sql = "SELECT DISTINCT t2.id,t2.service_id, lower(t2.value) as name1, lower(s.name) as name2  
            FROM `company_service_value` t1
            join service_property_value t2 ON t1.service_property_value_id = t2.id
            join service s ON s.id = t2.service_id";

        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($data as $key => $value) {
            $model = new \app\models\SeoPattern();
            $model->url = 'catalog/' . str_replace(' ', '-', $value['name1']) . '/' . str_replace(' ', '-', $value['name2']);
            $model->controller = 'site/catalog';
            $model->parms = \json_encode(['service_property_value_id' => $value['id'], 'service_id' => $value['service_id']]);

            try {
                $model->save();
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
                die;
            }
        }
        return ExitCode::OK;
    }
}
