<?php

namespace app\models;

use Yii;
use app\models\AdminLoginLog;

/**
 * This is the model class for table "admin_user".
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $password
 * @property string $description
 * @property int $admin_group_id
 * @property string $alias
 * @property int $social_id
 * @property string $avatar_for_delete
 *
 * @property OrderInfo[] $orderInfos
 * @property OrderStatus[] $orderStatuses
 */
class AdminUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['admin_group_id', 'social_id'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 128],
            [['login', 'password', 'avatar_for_delete'], 'string', 'max' => 255],
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
            'login' => 'Login',
            'password' => 'Password',
            'description' => 'Description',
            'admin_group_id' => 'Admin Group ID',
            'alias' => 'Alias',
            'social_id' => 'Social ID',
            'avatar_for_delete' => 'Avatar For Delete',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatuses()
    {
        return $this->hasMany(OrderStatus::className(), ['user_id' => 'id']);
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        if ($this->admin_group_id != 13 && (crypt($password, $this->password) == $this->password)){
            
            $log = new AdminLoginLog();
            $log->user_id = $this->id;
            $log->ip = \Yii::$app->request->remoteIP;
            $log->save();
            return true;
        }
        return FALSE;
    }
}
