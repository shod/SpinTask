<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_inquiry".
 *
 * @property int $id
 * @property string $created_at
 * @property int $inquiry_type_id
 * @property int $company_id
 * @property int $service_id
 * @property string $description
 *
 * @property InquiryType $inquiryType
 * @property Company $company
 * @property Service $service
 * @property ServiceInquiryValue[] $serviceInquiryValues
 * @property ServicePropertyValue[] $servicePropertyValues
 */
class ServiceInquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_inquiry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'inquiry_type_id', 'company_id', 'service_id'], 'required'],
            [['created_at'], 'safe'],
            [['inquiry_type_id', 'company_id', 'service_id'], 'integer'],
            [['description'], 'string', 'max' => 1024],
            [['inquiry_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => InquiryType::className(), 'targetAttribute' => ['inquiry_type_id' => 'id']],
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
            'created_at' => 'Created At',
            'inquiry_type_id' => 'Inquiry Type ID',
            'company_id' => 'Company ID',
            'service_id' => 'Service ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInquiryType()
    {
        return $this->hasOne(InquiryType::className(), ['id' => 'inquiry_type_id']);
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
    public function getServiceInquiryValues()
    {
        return $this->hasMany(ServiceInquiryValue::className(), ['service_inquiry_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicePropertyValues()
    {
        return $this->hasMany(ServicePropertyValue::className(), ['id' => 'service_property_value_id'])->viaTable('service_inquiry_value', ['service_inquiry_id' => 'id']);
    }
}
