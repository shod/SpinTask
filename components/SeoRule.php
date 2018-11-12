<?php

namespace app\components;

use yii\web\UrlRule;

class SeoRule extends UrlRule
{
    
    private $collection = [];
    
    public function init()
    {
        if ($this->name === null) {
            $this->name = __CLASS__;
        }
    }

    public function createUrl($manager, $route, $params)
    {
        
      /*  dd($manager);
        dd($route);
        dd($params);
        die('1111111111');*/
        $route = trim($route);
        $params_md5 = md5(print_r($params,1));
        if(isset($this->collection[$route][$params_md5])){
            return $this->collection[$route][$params_md5];
        }
        
        foreach ($params as $key => $value) {
            if(empty($value)){
                unset($params[$key]);
            }
        }
        $model = \app\models\SeoPattern::getByParams($route, $params);
        if($model){
            $toRoute = [];
            if(isset($params['p']) && $params['p'] > 1){
                $toRoute['p'] = (int)$params['p'];
            }
            if(isset($params['order'])){
                $toRoute['order'] = $params['order'];
            }
            if(isset($params['type']) && $params['type']){
                $toRoute['type'] = $params['type'];
            }
           

            /*
            if(isset($params['new']) && $params['new']){
                $model->url .= '/new';
            }elseif(isset($params['hit']) && $params['hit']){
                $model->url .= '/hit';
            }elseif(isset($params['kredit']) && $params['kredit']){
                $model->url .= '/kredit';
            }elseif(isset($params['rassrochka']) && $params['rassrochka']){
                $model->url .= '/rassrochka';
            }else
            */ 
           /* if(isset($params['made']) && $params['made']){
                $model->url .= '/' . $params['made'];
            }
*/
        /*    if(count($toRoute) && count($p) ){
                if($is_full_pattern){
                    $diff = $this->array_diff_assoc_recursive($toRoute, $p);
                }else{
                    $diff = $toRoute;
                }
                if($http_build_query = @http_build_query($diff)){
                    $this->collection[$route][$params_md5] = $model->url . '/?' . urldecode($http_build_query);
                    return $this->collection[$route][$params_md5];
                }
            }*/
            $this->collection[$route][$params_md5] =  $model->url . '/';
            return $this->collection[$route][$params_md5];
        }
        return false;  // это правило не подходит
    }
    
    private function array_diff_assoc_recursive($array1, $array2) {
        foreach ($array1 as $key => $value) {
            if (is_array($value)) {
                if (!isset($array2[$key])) {
                    $difference[$key] = $value;
                } elseif (!is_array($array2[$key])) {
                    $difference[$key] = $value;
                } else {
                    $new_diff = $this->array_diff_assoc_recursive($value, $array2[$key]);
                    if ($new_diff != FALSE) {
                        $difference[$key] = $new_diff;
                    }
                }
            } elseif (!isset($array2[$key]) || $array2[$key] != $value) {
                $difference[$key] = $value;
            }
        }
        return !isset($difference) ? FALSE : $difference;
    }

    public function parseRequest($manager, $request)
    {
        $model = \app\models\SeoPattern::getByUrl( $request->getPathInfo() );
        if($model){
            if(count($_GET)){
                $modelByParams = \app\models\SeoPattern::getByParams($model->controller, $_GET );
                if($modelByParams && $model->id != $modelByParams->id){
                    \Yii::$app->getResponse()->redirect('/' . $modelByParams->url, 301);
                    \Yii::$app->end();
                }
            }
            
            \Yii::$app->request->seo = $model;
            $parms = \yii\helpers\Json::decode($model->parms, TRUE);
            $parms['seo_id'] = $model->id;
            $metainfo = \app\components\SeoTextService::getMetaIfno($model);
            \app\components\SeoTextService::setMetaInformation($metainfo);
        
            return [$model->controller, $parms];
            return array_merge([$model->controller], $parms);
        }else{
            //$model = \app\models\SeoPattern::getByParams( $_GET );
        }
        return false;
    }
    
}
