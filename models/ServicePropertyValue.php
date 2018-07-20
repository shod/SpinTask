<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_property_value".
 *
 * @property int $id
 * @property int $service_id
 * @property int $service_property_id
 * @property string $value
 * @property int $setting_bit
 *
 * @property ServiceInquiryValue[] $serviceInquiryValues
 * @property ServiceInquiry[] $serviceInquiries
 * @property ServiceProperty $serviceProperty
 * @property Service $service
 */
class ServicePropertyValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_property_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'service_property_id', 'value'], 'required'],
            [['service_id', 'service_property_id', 'setting_bit'], 'integer'],
            [['value'], 'string', 'max' => 1024],
            [['service_property_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceProperty::className(), 'targetAttribute' => ['service_property_id' => 'id']],
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
            'service_id' => 'Service ID',
            'service_property_id' => 'Service Property ID',
            'value' => 'Value',
            'setting_bit' => 'Setting Bit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInquiryValues()
    {
        return $this->hasMany(ServiceInquiryValue::className(), ['service_property_value_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInquiries()
    {
        return $this->hasMany(ServiceInquiry::className(), ['id' => 'service_inquiry_id'])->viaTable('service_inquiry_value', ['service_property_value_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceProperty()
    {
        return $this->hasOne(ServiceProperty::className(), ['id' => 'service_property_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
}
