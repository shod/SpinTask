<?php

namespace app\components;
use Yii;

/**
 * Description of SeoService
 *
 * @author Shchemelev E. <schevgeny@gmail.com>
 */
class SeoTextService {
   

    /*     * *
     * Получение мета информации о странице
     */

    public static function getMetaIfno($seo_model): array {
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
        foreach($patternModels as $model){
            $patterns[$model->type] = $model->text;
        }
        
        if($seo_model->title){
            $patterns['title'] = $seo_model->title;
        }
        if($seo_model->h1){
            $patterns['h1'] = $seo_model->h1;
        }
        if($seo_model->description){
            $patterns['description'] = $seo_model->description;
        }
    
        
        $arrmeta['title'] = self::paramsReplace($patterns['title'], $parms);
        $arrmeta['title'] = self::regionTextReplace($arrmeta['title']);

        $arrmeta['description'] = self::paramsReplace($patterns['description'], $parms);
        $arrmeta['description'] = self::regionTextReplace($arrmeta['description']);

        $arrmeta['h1'] = self::paramsReplace($patterns['h1'], $parms);
        $arrmeta['h1'] = self::regionTextReplace($arrmeta['h1']);


        if (empty($arrmeta['title'])) {
            $arrmeta['title'] = $seo_model->h1;
        }
        if (empty($arrmeta['h1'])) {
            $arrmeta['h1'] = $seo_model->h1;
        }
        if (empty($arrmeta['description'])) {
            $arrmeta['description'] = $seo_model->h1;
        }

        return $arrmeta;
    }
    
    public static function setMetaInformation($meta) {
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

    private static function regionTextReplace($text, $region_name = ''): string {
        $region = '';
       /* if (!empty($region_name)) {
            $region = $region_name;
        } else {
            $region = self::getCurrentName('pred');
        }*/
        return \Yii::t('SeoPatternv2', $text, ['region' => $region]);
    }

    private static function paramsReplace($text, $parms): string {
        $region = '';
        foreach ($parms as $key => $value) {
           switch ($key) {
               case 'service_property_value_id':
                    $replaceText = \app\models\ServicePropertyValue::findOne($value)->value;
                    $text = str_replace( '{'.$value.'}','',$text);
                   break;
                   case 'service_id':
                   $replaceText = \app\models\Service::findOne($value)->name;
                   $text = str_replace( '{'.$value.'}','',$replaceText);
                   break;   
               default:
                    $text = str_replace( '{'.$key.'}','',$text);
                   break;
           }
        }

        return $text;
    }
    
    
    private static function getCurrentName($type = 'imen', $isToLower = false) {
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
