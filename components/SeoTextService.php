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

        $arrmeta['title'] = self::regionTextReplace($seo_model->title);
        $arrmeta['keyword'] = self::regionTextReplace($seo_model->keyword);
        $arrmeta['description'] = self::regionTextReplace($seo_model->description);

        if (empty($arrmeta['title'])) {
            $arrmeta['title'] = $seo_model->h1;
        }
        if (empty($arrmeta['keyword'])) {
            $arrmeta['keyword'] = $seo_model->h1;
        }
        if (empty($arrmeta['description'])) {
            $arrmeta['description'] = $seo_model->h1;
        }

        return $arrmeta;
    }
    
    public static function setMetaInformation($meta) {
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $meta['keyword'],           
        ]);
         
        \Yii::$app->view->registerMetaTag([            
            'name' => 'description',
            'content' => $meta['description'],            
        ]);
        
        \Yii::$app->view->title = $meta['title'];
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
