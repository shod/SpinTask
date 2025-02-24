<?php

namespace app\models_ex;

use Yii;
use yii\helpers\Url;
use app\models\CompanyServiceValue;
//use app\models\SeoPattern;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property int $setting_bit
 *
 * @property BillAccount[] $billAccounts
 * @property BusinessOwner $id0
 * @property CompanyServiceValue[] $companyServiceValues
 * @property ServiceInquiry[] $serviceInquiries
 */
class Company extends \schevgeny\yii\db\TSFlaggedActiveRecord
{
    protected static $singleton_class = __CLASS__;
	protected $companyPath = 'us/company'; //us/catalog/site/buisness

    public static function getImageDir()
    {
        return Yii::getAlias('@webroot') . '/img/companies/us/';
    }

	/*
	* Get loacl path to logo image
	*/
    public function getImageUrl()
    {
        return $this->getImageDir() . substr($this->id, 0, 2);
    }

    public function getUrl()
    {
		$params = ['company_id' => (int)$this->id, "city_id" => (int)$this->city_id, "region_id" => (int)$this->state_id];		
		$url = SeoPattern::getUrlByParams('site/buisness', $params);
				
		//$url = $seoObj->getAttribute('url');
		//var_dump($seoObj);
		
		if( $url ){
			return '/' . $url;
		}				
        return Url::to(['site/buisness', 'company_id' => (string)$this->id, "city_id" => (string)$this->city_id, "region_id" => (string)$this->state_id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyServiceValues()
    {
        return $this->hasMany(CompanyServiceValue::className(), ['company_service_id' => 'id'])->viaTable('company_service', ['company_id' => 'id']);
    }

    /**/
    public function getCompanyTopServiceValues()
    {
        return Yii::$app->db->createCommand("select spv.value from company_service as cs, service_property as sp, service_property_value as spv, company_service_value as csv
            where cs.company_id = " . $this->id . "
            /*and cs.service_id = 22 */
            and sp.service_id = cs.service_id 
            and spv.service_property_id = sp.id and spv.service_id = cs.service_id
            /*and sp.id = 17 */
            and csv.company_service_id = cs.id and csv.service_property_value_id = spv.id;")->queryAll();
    }
}
