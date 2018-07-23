<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_service_value".
 *
 * @property int $id
 * @property int $company_service_id
 * @property int $service_property_value_id
 *
 * @property CompanyService $companyService
 * @property ServicePropertyValue $servicePropertyValue
 */
class CompanyServiceValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_service_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_service_id', 'service_property_value_id'], 'required'],
            [['company_service_id', 'service_property_value_id'], 'integer'],
            [['company_service_id', 'service_property_value_id'], 'unique', 'targetAttribute' => ['company_service_id', 'service_property_value_id']],
            [['company_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyService::className(), 'targetAttribute' => ['company_service_id' => 'id']],
            [['service_property_value_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServicePropertyValue::className(), 'targetAttribute' => ['service_property_value_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_service_id' => 'Company Service ID',
            'service_property_value_id' => 'Service Property Value ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyService()
    {
        return $this->hasOne(CompanyService::className(), ['id' => 'company_service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicePropertyValue()
    {
        return $this->hasOne(ServicePropertyValue::className(), ['id' => 'service_property_value_id']);
    }
}
