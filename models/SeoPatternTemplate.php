<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo_pattern_template".
 *
 * @property int $id
 * @property string $type
 * @property string $text
 * @property int $params_bit
 */
class SeoPatternTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo_pattern_template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'params_bit'], 'required'],
            [['id', 'params_bit'], 'integer'],
            [['type', 'text'], 'string'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'text' => 'Text',
            'params_bit' => 'Params Bit',
        ];
    }
}
