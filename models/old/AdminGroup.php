<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_group".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property AdminPermission[] $adminPermissions
 */
class AdminGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'string', 'max' => 255],
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
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminPermissions()
    {
        return $this->hasMany(AdminPermission::className(), ['admin_group_id' => 'id']);
    }
}
