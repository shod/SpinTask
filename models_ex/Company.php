<?php

namespace app\models_ex;

use Yii;
use yii\helpers\Url;
use \app\models\CompanyServiceValue;

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
    
    public static function getImageDir() {
        return Yii::getAlias('@webroot') . '/uploads/company/';
    }
    
    public static function getImageUrl() {
        return '/uploads/company/';
    }

    public function getUrl(){
        return Url::to(['site/buisness', 'company_id' => (string)$this->id, "city_id" => (string)$this->city_id,"region_id" => (string)$this->state_id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyServiceValues()
    {
        return $this->hasMany(CompanyServiceValue::className(), ['company_service_id' => 'id'])->viaTable('company_service', ['company_id' => 'id']);
    }
}