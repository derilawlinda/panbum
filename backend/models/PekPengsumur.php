<?php

namespace backend\models;

use \backend\models\base\PekPengsumur as BasePekPengsumur;

/**
 * This is the model class for table "pek_pengsumur".
 */
class PekPengsumur extends BasePekPengsumur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            
            [['id_pengsumur', 'id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date','file'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255]
        ]);
    }
	
}
