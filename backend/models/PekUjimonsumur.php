<?php

namespace backend\models;

use \backend\models\base\PekUjimonsumur as BasePekUjimonsumur;

/**
 * This is the model class for table "pek_ujimonsumur".
 */
class PekUjimonsumur extends BasePekUjimonsumur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
           
            [['id_ujimonsumur', 'id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date','file'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255]
        ]);
    }
	
}
