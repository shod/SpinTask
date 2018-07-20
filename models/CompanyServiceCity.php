<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_service_city".
 *
 * @property int $company_service_id
 * @property int $city_id
 *
 * @property Company $companyService
 * @property City $city
 */
class CompanyServiceCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_service_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_service_id', 'city_id'], 'required'],
            [['company_service_id', 'city_id'], 'integer'],
            [['company_service_id', 'city_id'], 'unique', 'targetAttribute' => ['company_service_id', 'city_id']],
            [['company_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_service_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_service_id' => 'Company Service ID',
            'city_id' => 'City ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyService()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
