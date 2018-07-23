<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_login_log".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $date_login
 */
class AdminLoginLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_login_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'ip'], 'required'],
            [['user_id'], 'integer'],
            [['date_login'], 'safe'],
            [['ip'], 'string', 'max' => 100],
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
