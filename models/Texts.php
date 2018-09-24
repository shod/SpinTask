<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "texts".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int $section_id
 * @property int $position
 * @property int $owner_id
 */
class Texts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'texts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['section_id', 'position', 'owner_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
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
            'text' => 'Text',
            'section_id' => 'Section ID',
            'position' => 'Position',
            'owner_id' => 'Owner ID',
        ];
    }
}
