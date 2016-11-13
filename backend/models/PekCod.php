<?php

namespace backend\models;

use \backend\models\base\PekCod as BasePekCod;

/**
 * This is the model class for table "pek_cod".
 */
class PekCod extends BasePekCod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            
            [['id_cod', 'id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date'], 'safe'],
            [['target', 'capaian', 'remark', 'file'], 'string', 'max' => 255],
            [['file'], 'safe']
        ]);
    }
	
}
