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
class ServiceProperty extends \schevgeny\yii\db\TSFlaggedActiveRecord {

    protected static $singleton_class = __CLASS__;
    
    public $showinform;
    public $required;

    public function flags() {
        return [
            'showinform',
            'required',
        ];
    }

}
