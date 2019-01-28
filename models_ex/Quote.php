<?php

namespace app\models_ex;

use Yii;

/**
 * This is the model class for table "business_owner".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property int $setting_bit
 *
 * @property BillAccount $billAccount
 * @property Company $company
 */
class Quote extends \schevgeny\yii\db\TSFlaggedActiveRecord
{
    protected static $singleton_class = __CLASS__;
}
