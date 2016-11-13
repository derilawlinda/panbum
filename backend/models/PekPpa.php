<?php

namespace backend\models;

use \backend\models\base\PekPpa as BasePekPpa;

/**
 * This is the model class for table "pek_ppa".
 */
class PekPpa extends BasePekPpa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date','file'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255]
        ]);
    }
	
}
