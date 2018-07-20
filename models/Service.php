<?php

namespace app\models;

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
class Service extends \app\models_ex\Service
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'industry_id'], 'required'],
            [['industry_id', 'setting_bit'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['industry_id'], 'exist', 'skipOnError' => true, 'targetClass' => Industry::className(), 'targetAttribute' => ['industry_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'industry_id' => 'Industry ID',
            'setting_bit' => 'Setting Bit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyServices()
    {
        return $this->hasMany(CompanyService::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['id' => 'company_id'])->viaTable('company_service', ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['id' => 'industry_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInquiries()
    {
        return $this->hasMany(ServiceInquiry::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceProperties()
    {
        return $this->hasMany(ServiceProperty::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicePropertyValues()
    {
        return $this->hasMany(ServicePropertyValue::className(), ['service_id' => 'id']);
    }
}
