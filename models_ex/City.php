<?php

namespace app\models_ex;

use Yii;



class City extends \schevgeny\yii\db\TSFlaggedActiveRecord
{
    protected static $singleton_class = __CLASS__;
    
    public function getUrl($industry_id){
        return yii\helpers\Url::to(['site/catalog', "industry_id" => (string)$industry_id, 
        'region_id' => (string)$this->region_id,
        'city_id' => (string)$this->id,]);
    }

}