<?php

namespace app\models_ex;

use Yii;

/**
 * This is the model class for table "seo_pattern".
 *
 * @property int $id
 * @property int $section_id
 * @property string $url
 * @property string $parms
 * @property string $title
 * @property string $keyword
 * @property string $description
 * @property string $h1
 * @property int $type значения могут быть 3,2,1,0
 * @property string $route
 * @property string $class
 * @property int $parms_crc
 * @property string $parms_md5
 * @property string $title_2
 * @property int $hide
 * @property int $setting_bit
 */
class SeoPattern extends \yii\db\ActiveRecord
{
    
    public static function getByUrl($url) {
		//dd($url);
        $url = trim($url, '/');
        return self::find()->where(['url' => addslashes($url)])->limit(1)->cache(0)->one();
    }
    
    public static function getByParams($route, $params){
		//dd($route);
        $route = trim($route, '/');
        //dd(\yii\helpers\Json::encode($params));
		//dd(self::find()->where(['controller' => $route, 'parms' => \yii\helpers\Json::encode($params)])->one());
        return self::find()->where(['controller' => $route, 'parms' => \yii\helpers\Json::encode($params)])->one();
    }
	
	public static function getUrlByParams($route, $params){
		//dd($route);
        $route = trim($route, '/');
        //dd(\yii\helpers\Json::encode($params));		
		$obj = self::find()->where(['controller' => $route, 'parms' => \yii\helpers\Json::encode($params)])->one();
		
		if($obj !== null ){
			$url = $obj->url;
			return $url;
		}
		return null;
        //return self::find()->where(['controller' => $route, 'parms' => \yii\helpers\Json::encode($params)])->one();
    }
    
    /**
     * Возвращает массив преобразованный из параметров
     */
    public static function convertParamsToArray($params){		
	//dd($params);
        $un_param = \app\helpers\SiteService::unserialize($params);               
        return self::_convert_param_item_to_str($un_param);
    }
    
    public function getUrlParams() 
	{				
        //$params = (array)yii\helpers\Json::decode($this->parms);		
		//$params = (array)json_decode($this->parms);
		//$this->parms = trim($this->parms, '/');
		$params = [];
		
		if($this->parms !== '/' && $this->parms !== '' && $this->parms !== null){
			$params = (array)json_decode($this->parms);
		}
		
        return array_merge([$this->controller], $params);
    }

    
}
