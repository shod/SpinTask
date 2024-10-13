<?php

namespace app\components;

use Yii;

/**
 * Description of SeoService
 *
 * @author Shchemelev E. <schevgeny@gmail.com>
 */
class SeoTextService
{


    /*     * *
     * Получение мета информации о странице
     */

    public static function getMetaIfno($seo_model): array
    {
        //$arrmeta = ['title' => '', 'keyword' => '', 'description' => '', ];
        //$seo_id = Yii::$app->request->get('seo_id');
        //$seo_model = \app\models\SeoPattern::findOne($seo_id);

        $parms = json_decode($seo_model->parms);
        $parms_keys = array_keys((array)$parms);

        $patternModels = \app\models\SeoPatternTemplate::find()->where(['params_mask' => json_encode($parms_keys)])->all();

        $titlePattern = $seo_model->title;
        $descriptionPattern = $seo_model->description;
        $h1Pattern = $seo_model->h1;

        $patterns = [];
        foreach ($patternModels as $model) {
            $patterns[$model->type] = $model->text;
        }

        if ($seo_model->title) {
            $patterns['title'] = $seo_model->title;
        }
        /*if($seo_model->h1){
            $patterns['h1'] = $seo_model->h1;
        }*/
        if ($seo_model->description) {
            $patterns['description'] = $seo_model->description;
        }

        if (!isset($patterns['title'])) {
            throw new \Exception("Seo title pattern not exist for:" . json_encode($parms_keys), 500);
        }

        if (!isset($patterns['description'])) {
            throw new \Exception("Seo description pattern not exist for:" . json_encode($parms_keys), 500);
        }

        $arrmeta['title'] = self::paramsReplace($patterns['title'], $parms, $seo_model->h1);
        //$arrmeta['title'] = self::regionTextReplace($arrmeta['title']);
        $arrmeta['title'] = ucwords($arrmeta['title']);

        $arrmeta['description'] = self::paramsReplace($patterns['description'], $parms, $seo_model->h1);
        //$arrmeta['description'] = self::regionTextReplace($arrmeta['description']);

        $seo_model->h1 = ucwords($seo_model->h1);
        $arrmeta['h1'] = $seo_model->h1;

        return $arrmeta;
    }

    public static function setMetaInformation($meta)
    {
        /* \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $meta['keyword'],           
        ]);*/

        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $meta['description'],
        ]);

        \Yii::$app->view->title = $meta['title'];
        //\Yii::$app->view->h1 = $meta['h1'];
    }


    /*     * *
     * Заменяет резион в тексте
     * @$text - текст для замены
     * @$region_name - регион для замены
     */

    private static function regionTextReplace($text, $region_name = ''): string
    {
        $region = '';
        /* if (!empty($region_name)) {
            $region = $region_name;
        } else {
            $region = self::getCurrentName('pred');
        }*/
        return \Yii::t('SeoPatternv2', $text, ['region' => $region]);
    }

    private static function paramsReplace($text, $parms, $h1): string
    {

        $region = '';
        foreach ($parms as $key => $value) {
            switch ($key) {
                case 'service_property_value_id':
                    $replaceText = \app\models\ServicePropertyValue::findOne($value)->value;
                    $key = 'ServicePropertyValue';
                    break;
                case 'service_id':
                    $replaceText = \app\models\Service::findOne($value)->name;
                    $key = 'Service';
                    break;
                case 'company_id':
                    $replaceText = \app\models\Company::findOne($value)->name;
                    $key = 'Company';
                    break;
                case 'city_id':
                    $replaceText = \app\models\City::findOne($value)->name;
                    $key = 'City';
                    break;
                case 'region_id':
                    $replaceText = \app\models\Region::findOne($value)->name;
                    $key = 'Region';
                    break;
                case 'industry_id':
                    $replaceText = \app\models\Industry::findOne($value)->name;
                    $key = 'Industry';
                    break;
                default:
                    $replaceText = '';
                    break;
            }
            $text = str_replace('{' . $key . '}', $replaceText, $text);
        }
        $text = str_replace(['{app_name}', '{h1}'], [\Yii::$app->name, $h1], $text);
        return $text;
    }


    private static function getCurrentName($type = 'imen', $isToLower = false)
    {
        $region = Yii::$app->session['region'];
        if (!$region) {
            $region = 636;
        }

        //MTODO можно сделать без базы, просто через массив
        //if ($type == 'imen') {
        $name = \app\models\DeliveryGeo::findOne($region)->name;
        //} else {
        //     $name = DeliveryGeoMorph::findOne($region)->$type;
        // }

        return mb_convert_case($name, MB_CASE_TITLE, self::CHARSET);
    }
}
