<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_property".
 *
 * @property int $id
 * @property int $service_id
 * @property string $name
 * @property string $type
 * @property string $measure
 * @property int $setting_bit
 *
 * @property Service $service
 * @property ServicePropertyValue[] $servicePropertyValues
 */
class ServiceProperty extends \app\models_ex\ServiceProperty
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_property';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'name'], 'required'],
            [['service_id', 'setting_bit'], 'integer'],
            [['type'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['measure'], 'string', 'max' => 128],
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
            'name' => 'Name',
            'type' => 'Type',
            'measure' => 'Measure',
            'setting_bit' => 'Setting Bit',
        ];
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
    public function getServicePropertyValues()
    {
        return $this->hasMany(ServicePropertyValue::className(), ['service_property_id' => 'id']);
    }
}
