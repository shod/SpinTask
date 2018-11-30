<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mail_rule".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $sql_query
 * @property string $template
 * @property string $active
 */
class MailRule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_rule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sql_query'], 'string'],
            [['name', 'type', 'template', 'active'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'sql_query' => 'Sql Query',
            'template' => 'Template',
            'active' => 'Active',
        ];
    }
}
