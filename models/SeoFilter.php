<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo_filter".
 *
 * @property int $id
 * @property int $seo_id
 *
 * @property SeoPattern $seo
 */
class SeoFilter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo_filter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seo_id'], 'integer'],
            [['seo_id'], 'exist', 'skipOnError' => true, 'targetClass' => SeoPattern::className(), 'targetAttribute' => ['seo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seo_id' => 'Seo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeo()
    {
        return $this->hasOne(SeoPattern::className(), ['id' => 'seo_id']);
    }
}
