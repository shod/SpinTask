<?php

namespace app\models_ex;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $name
 * @property int $industry_id
 * @property int $setting_bit
 *
 * @property CompanyService[] $companyServices
 * @property Company[] $companies
 * @property Industry $industry
 * @property ServiceInquiry[] $serviceInquiries
 * @property ServiceProperty[] $serviceProperties
 * @property ServicePropertyValue[] $servicePropertyValues
 */
class Service extends \yii\db\ActiveRecord
{
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrentCompanyServices($id)
    {
        return $this->hasMany(\app\models\CompanyService::className(), ['service_id' => 'id', 'company_id' => $id]);
    }

   
}
