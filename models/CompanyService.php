<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_service".
 *
 * @property int $id
 * @property int $company_id
 * @property int $service_id
 * @property string $description
 * @property string $email
 * @property string $image
 *
 * @property Company $company
 * @property Service $service
 * @property CompanyServiceValue[] $companyServiceValues
 * @property ServicePropertyValue[] $servicePropertyValues
 */
class CompanyService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'service_id'], 'required'],
            [['company_id', 'service_id'], 'integer'],
            [['description', 'email', 'image'], 'string', 'max' => 255],
            [['company_id', 'service_id'], 'unique', 'targetAttribute' => ['company_id', 'service_id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'service_id' => 'Service ID',
            'description' => 'Description',
            'email' => 'Email',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyServiceValues()
    {
        return $this->hasMany(CompanyServiceValue::className(), ['company_service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicePropertyValues()
    {
        return $this->hasMany(ServicePropertyValue::className(), ['id' => 'service_property_value_id'])->viaTable('company_service_value', ['company_service_id' => 'id']);
    }
}
