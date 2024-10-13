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
 * @property string $map
 * @property int $state_id
 *
 * @property BillAccount[] $billAccounts
 * @property City $city
 * @property Region $state
 * @property BusinessOwner $buisness
 * @property CompanyService[] $companyServices
 * @property Service[] $services
 * @property CompanyServiceCity[] $companyServiceCities
 * @property City[] $cities
 * @property Quote[] $quotes
 * @property ServiceInquiry[] $serviceInquiries
 */
class Company extends \app\models_ex\Company
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
            [['buisness_id', 'setting_bit', 'paid', 'city_id', 'state_id', 'is_active'], 'integer'],
            [['created_at'], 'safe'],
            [['description', 'map'], 'string'],
            [['name', 'phone', 'extention', 'ring_central_extention', 'local_phone', 'local_contact_name', 'email', 'website', 'street', 'postal_code', 'image'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['state_id' => 'id']],
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
            'map' => 'Map',
            'state_id' => 'State ID',
            'is_active' => 'Active'
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
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(Region::className(), ['id' => 'state_id']);
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
    public function getCompanyServices()
    {
        return $this->hasMany(CompanyService::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::className(), ['id' => 'service_id'])->viaTable('company_service', ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyServiceCities()
    {
        return $this->hasMany(CompanyServiceCity::className(), ['company_service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['id' => 'city_id'])->viaTable('company_service_city', ['company_service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotes()
    {
        return $this->hasMany(Quote::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceInquiries()
    {
        return $this->hasMany(ServiceInquiry::className(), ['company_id' => 'id']);
    }
}
