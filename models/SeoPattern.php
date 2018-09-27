<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo_pattern".
 *
 * @property int $id
 * @property int $section_id
 * @property string $url
 * @property string $parms
 * @property string $title
 * @property string $keyword
 * @property string $description
 * @property string $h1
 * @property int $type значения могут быть 3,2,1,0
 * @property string $route
 * @property string $class
 * @property int $parms_crc
 * @property string $parms_md5
 * @property string $title_2
 * @property int $hide
 * @property int $setting_bit
 */
class SeoPattern extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo_pattern';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id', 'parms_md5', 'setting_bit'], 'required'],
            [['section_id', 'type', 'parms_crc', 'hide', 'setting_bit'], 'integer'],
            [['parms', 'description'], 'string'],
            [['url', 'title', 'keyword', 'h1', 'parms_md5', 'title_2'], 'string', 'max' => 255],
            [['route'], 'string', 'max' => 64],
            [['class'], 'string', 'max' => 32],
            [['url'], 'unique'],
            [['parms_md5'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_id' => 'Section ID',
            'url' => 'Url',
            'parms' => 'Parms',
            'title' => 'Title',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'h1' => 'H1',
            'type' => 'Type',
            'route' => 'Route',
            'class' => 'Class',
            'parms_crc' => 'Parms Crc',
            'parms_md5' => 'Parms Md5',
            'title_2' => 'Title 2',
            'hide' => 'Hide',
            'setting_bit' => 'Setting Bit',
        ];
    }
}
