<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $group_id;
/*
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];
*/

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = AdminUser::findOne($id);
        return self::getUserModel($user);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = AdminUser::find()->where(['login' => addslashes($username)])->one();
        return self::getUserModel($user);
    }
    
    private static function getUserModel($user) {
        if($user){
            $obj = new User();
            $obj->id = $user->id;
            $obj->password = $user->password;
            $obj->username = $user->login;
            $obj->authKey = $user->name;
            $obj->accessToken = md5($user->login);
            $obj->group_id = $user->admin_group_id;
            return $obj;
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        if ($this->group_id != 13 && (crypt($password, $this->password) == $this->password)){
            
            $log = new AdsLoginLog();
            $log->user_id = $this->id;
            $log->ip = $_SERVER['REMOTE_ADDR'];
            $log->save();
            
            return true;
        }
        return FALSE;
    }
}
