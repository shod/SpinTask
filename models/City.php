<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $region_id
 * @property string $name
 * @property string $code
 *
 * @property CompanyServiceCity[] $companyServiceCities
 * @property Company[] $companyServices
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'region_id', 'name'], 'required'],
            [['id', 'region_id'], 'integer'],
            [['name', 'code'], 'string', 'max' => 32],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_id' => 'Region ID',
            'name' => 'Name',
            'code' => 'Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyServiceCities()
    {
        return $this->hasMany(CompanyServiceCity::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyServices()
    {
        return $this->hasMany(Company::className(), ['id' => 'company_service_id'])->viaTable('company_service_city', ['city_id' => 'id']);
    }
}
