<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business_owner".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property int $setting_bit
 *
 * @property BillAccount $billAccount
 * @property Company[] $companies
 */
class BusinessOwner extends \app\models_ex\BusinessOwner
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'business_owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['setting_bit'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'created_at' => 'Created At',
            'setting_bit' => 'Setting Bit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillAccount()
    {
        return $this->hasOne(BillAccount::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['buisness_id' => 'id']);
    }
}
