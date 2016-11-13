<?php

namespace backend\models;

use \backend\models\base\PekEpc as BasePekEpc;

/**
 * This is the model class for table "pek_epc".
 */
class PekEpc extends BasePekEpc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            
            [['id_epc', 'id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255],
            [['file'], 'safe']
        ]);
    }
	
}
