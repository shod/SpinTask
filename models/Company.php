<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $buisness_id
 * @property string $name
 * @property string $created_at
 * @property int $setting_bit
 * @property string $phone
 * @property int $paid
 * @property string $extention
 * @property string $ring_central_extention
 * @property int $city_id
 * @property string $local_phone
 * @property string $local_contact_name
 * @property string $email
 * @property string $website
 * @property string $description
 * @property string $street
 * @property string $postal_code
 * @property string $image
 *
 * @property BillAccount[] $billAccounts
 * @property BusinessOwner $buisness
 * @property CompanyServiceValue[] $companyServiceValues
 * @property ServiceInquiry[] $serviceInquiries
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buisness_id'], 'required'],
            [['buisness_id', 'setting_bit', 'paid', 'city_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'phone', 'extention', 'ring_central_extention', 'local_phone', 'local_contact_name', 'email', 'website', 'description', 'street', 'postal_code', 'image'], 'string', 'max' => 255],
            [['buisness_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessOwner::className(), 'targetAttribute' => ['buisness_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buisness_id' => 'Buisness ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'setting_bit' => 'Setting Bit',
            'phone' => 'Phone',
            'paid' => 'Paid',
            'extention' => 'Extention',
            'ring_central_extention' => 'Ring Central Extention',
            'city_id' => 'City ID',
            'local_phone' => 'Local Phone',
            'local_contact_name' => 'Local Contact Name',
            'email' => 'Email',
            'website' => 'Website',
            'description' => 'Description',
            'street' => 'Street',
            'postal_code' => 'Postal Code',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillAccounts()
    {
        return $this->hasMany(BillAccount::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuisness()
    {
        return $this->hasOne(BusinessOwner::className(), ['id' => 'buisness_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyServiceValues()
    {
        return $this->hasMany(CompanyServiceValue::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInquiries()
    {
        return $this->hasMany(ServiceInquiry::className(), ['company_id' => 'id']);
    }
}
