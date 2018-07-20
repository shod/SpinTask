<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inquiry_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property ServiceInquiry[] $serviceInquiries
 */
class InquiryType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inquiry_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 128],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInquiries()
    {
        return $this->hasMany(ServiceInquiry::className(), ['inquiry_type_id' => 'id']);
    }
}
