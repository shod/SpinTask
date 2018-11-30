<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quote".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $comment
 * @property string $params
 * @property int $company_id
 * @property string $created_at
 *
 * @property Company $company
 */
class Quote extends \app\models_ex\Quote
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'string'],
            [['company_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'email', 'phone', 'params'], 'string', 'max' => 255],
            [['phone', 'company_id'], 'unique', 'targetAttribute' => ['phone', 'company_id']],
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
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'comment' => 'Comment',
            'params' => 'Params',
            'company_id' => 'Company ID',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
