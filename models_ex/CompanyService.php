<?php

namespace app\models_ex;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property int $setting_bit
 *
 * @property BillAccount[] $billAccounts
 * @property BusinessOwner $id0
 * @property CompanyServiceValue[] $companyServiceValues
 * @property ServiceInquiry[] $serviceInquiries
 */
class CompanyService extends \schevgeny\yii\db\TSFlaggedActiveRecord
{
    protected static $singleton_class = __CLASS__;
    
    public $imageFile;
    
    public function upload()
    {
        if ($this->validate()) {
            $img = \yii\web\UploadedFile::getInstance($this, 'imageFile');
            if(!$img){
                return TRUE;
            }
            $img->saveAs(Yii::getAlias('@webroot') . '/uploads/company/service/' . $this->getImgFileName($img) );
            $this->image = $this->getImgFileName($img);
            return true;
        } else {
            return false;
        }
    }
    
    public function getImgFileName($img) {
        return $img->baseName . '.' . $img->extension;
    }
    
}