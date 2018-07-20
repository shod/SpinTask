<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_page_type".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 *
 * @property SysPageType $parent
 * @property SysPageType[] $sysPageTypes
 */
class SysPageType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_page_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysPageType::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(SysPageType::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysPageTypes()
    {
        return $this->hasMany(SysPageType::className(), ['parent_id' => 'id']);
    }
}
