<?php

namespace app\models_ex;

use Yii;
use yii\data\ActiveDataProvider;

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
class BusinessOwner extends \app\components\db\TSFlaggedActiveRecord
{
    protected static $singleton_class = __CLASS__;

   // public $name;
    
    public function search($params) {
        $query = \app\models\BusinessOwner::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
      //      'sort' => ['attributes' => ['size',]]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           // 'template_id' => $this->template_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        //$query->andFilterWhere(['like', 'params_mask', $this->params_mask]);
        

        return $dataProvider;
    }

}
