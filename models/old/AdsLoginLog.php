<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ads_login_log".
 *
 * @property int $id
 * @property int $user_id
 * @property int $ip
 * @property string $date_login
 */
class AdsLoginLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ads_login_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'ip'], 'integer'],
            [['date_login'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'ip' => 'Ip',
            'date_login' => 'Date Login',
        ];
    }
}
