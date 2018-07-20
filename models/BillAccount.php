<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill_account".
 *
 * @property int $id
 * @property int $bill_transaction_id
 * @property string $name
 * @property string $created_at
 * @property int $company_id
 *
 * @property BusinessOwner $id0
 * @property Company $company
 */
class BillAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bill_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bill_transaction_id', 'company_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessOwner::className(), 'targetAttribute' => ['id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bill_transaction_id' => 'Bill Transaction ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'company_id' => 'Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(BusinessOwner::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
