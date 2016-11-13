<?php

namespace backend\models;

use \backend\models\base\PekProcurement as BasePekProcurement;

/**
 * This is the model class for table "pek_procurement".
 */
class PekProcurement extends BasePekProcurement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255],
            [['file'], 'safe']
        ]);
    }
	
}
