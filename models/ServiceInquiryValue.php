<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_inquiry_value".
 *
 * @property int $service_inquiry_id
 * @property int $service_property_value_id
 *
 * @property ServiceInquiry $serviceInquiry
 * @property ServicePropertyValue $servicePropertyValue
 */
class ServiceInquiryValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_inquiry_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_inquiry_id', 'service_property_value_id'], 'required'],
            [['service_inquiry_id', 'service_property_value_id'], 'integer'],
            [['service_inquiry_id', 'service_property_value_id'], 'unique', 'targetAttribute' => ['service_inquiry_id', 'service_property_value_id']],
            [['service_inquiry_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceInquiry::className(), 'targetAttribute' => ['service_inquiry_id' => 'id']],
            [['service_property_value_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServicePropertyValue::className(), 'targetAttribute' => ['service_property_value_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'service_inquiry_id' => 'Service Inquiry ID',
            'service_property_value_id' => 'Service Property Value ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInquiry()
    {
        return $this->hasOne(ServiceInquiry::className(), ['id' => 'service_inquiry_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicePropertyValue()
    {
        return $this->hasOne(ServicePropertyValue::className(), ['id' => 'service_property_value_id']);
    }
}
