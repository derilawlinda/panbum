<?php

namespace backend\models;

use \backend\models\base\PekEksplorasi as BasePekEksplorasi;

/**
 * This is the model class for table "pek_eksplorasi".
 */
class PekEksplorasi extends BasePekEksplorasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date','file'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255]
        ]);
    }
	
}
