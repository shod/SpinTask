<?php

namespace app\models\up;

use Yii;

/**
 * This is the model class for table "sys_job".
 *
 * @property int $id
 * @property string $what
 * @property string $param
 * @property string $next_date
 * @property int $date_interval
 * @property int $flag_force
 * @property int $action
 * @property string $daystr
 * @property string $timestr
 * @property int $priority
 * @property int $state
 * @property string $state_message
 * @property string $last_date
 * @property string $last_message
 * @property string $start_date
 * @property int $att
 * @property int $f_kill 1 if need to be killed
 * @property int $sid server_id
 * @property int $active
 * @property int $update_interval
 * @property string $md5_price
 * @property int $seller_id
 */
class SysJob extends \yii\db\ActiveRecord
{
    
    public $price_url;
    
    function __construct() {
        $this->price_url = $this->sellerInfo->price_url;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_job';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_up');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timestr'], 'required'],
            [['what', 'param', 'last_message'], 'string'],
            [['next_date', 'last_date', 'start_date'], 'safe'],
            [['date_interval', 'flag_force', 'action', 'priority', 'state', 'att', 'f_kill', 'sid', 'active', 'update_interval', 'seller_id'], 'integer'],
            [['daystr'], 'string', 'max' => 12],
            [['timestr', 'state_message'], 'string', 'max' => 255],
            [['md5_price'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'what' => 'What',
            'param' => 'Param',
            'next_date' => 'Next Date',
            'date_interval' => 'Date Interval',
            'flag_force' => 'Flag Force',
            'action' => 'Action',
            'daystr' => 'Daystr',
            'timestr' => 'Timestr',
            'priority' => 'Priority',
            'state' => 'State',
            'state_message' => 'State Message',
            'last_date' => 'Last Date',
            'last_message' => 'Last Message',
            'start_date' => 'Start Date',
            'att' => 'Att',
            'f_kill' => 'F Kill',
            'sid' => 'Sid',
            'active' => 'Active',
            'update_interval' => 'Update Interval',
            'md5_price' => 'Md5 Price',
            'seller_id' => 'Seller ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSellerInfo()
    {
        return $this->hasOne(\app\models\SellerInfo::className(), ['seller_id' => 'seller_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(\app\models\Seller::className(), ['id' => 'seller_id']);
    }
}
