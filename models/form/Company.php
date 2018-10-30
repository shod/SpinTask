<?php

namespace app\models\form;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $buisness_id
 * @property string $name
 * @property string $created_at
 * @property int $setting_bit
 * @property string $phone
 * @property int $paid
 * @property string $extention
 * @property string $ring_central_extention
 * @property int $city_id
 * @property string $local_phone
 * @property string $local_contact_name
 * @property string $email
 * @property string $website
 * @property string $description
 * @property string $street
 * @property string $postal_code
 * @property string $image
 *
 * @property BillAccount[] $billAccounts
 * @property BusinessOwner $buisness
 * @property CompanyServiceValue[] $companyServiceValues
 * @property ServiceInquiry[] $serviceInquiries
 */
class Company extends Model
{
     /**
     * @var UploadedFile
     */
    public $imageFile;
    public $buisness_id;
    public $paid;
    public $state_id;
    public $city_id;
    public $name;
    public $phone;
    public $extention; 
    public $ring_central_extention; 
    public $local_phone; 
    public $local_contact_name; 
    public $email; 
    public $website; 
    public $description; 
    public $street; 
    public $postal_code;
    public $created_at;
    public $setting_bit;
    public $image;
    public $id;







    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['buisness_id'], 'required'],
            [['buisness_id', 'setting_bit', 'paid', 'city_id', 'state_id'], 'integer'],
            [['id', 'name', 'phone', 'extention', 'ring_central_extention', 'local_phone', 'local_contact_name', 'email', 'website', 'description', 'street', 'postal_code', 'image'], 'safe'],
            [['name', 'phone', 'extention', 'ring_central_extention', 'local_phone', 'local_contact_name', 'email', 'website', 'description', 'street', 'postal_code', 'image'], 'string', 'max' => 255],
         //   [['buisness_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessOwner::className(), 'targetAttribute' => ['buisness_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buisness_id' => 'Buisness ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'setting_bit' => 'Setting Bit',
            'phone' => 'Phone',
            'paid' => 'Paid',
            'extention' => 'Extention',
            'ring_central_extention' => 'Ring Central Extention',
            'city_id' => 'City ID',
            'state_id' => 'State ID',
            'local_phone' => 'Local Phone',
            'local_contact_name' => 'Local Contact Name',
            'email' => 'Email',
            'website' => 'Website',
            'description' => 'Description',
            'street' => 'Street',
            'postal_code' => 'Postal Code',
            'image' => 'Image',
        ];
    }

    public function upload()
    {
        if ($this->validate() && $this->imageFile) {
            $this->imageFile->saveAs( \app\models_ex\Company::getImageDir() . $this->getImgFileName() );
            return true;
        }elseif(!$this->imageFile){
       //     return true;
        } else {
            return false;
        }
    }
    
    public function getImgFileName() {
        if($this->imageFile)
        return $this->imageFile->baseName . '.' . $this->imageFile->extension;
    }
}
