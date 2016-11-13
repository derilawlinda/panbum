<?php

namespace backend\models;

use \backend\models\base\PekTransmisi as BasePekTransmisi;

/**
 * This is the model class for table "pek_transmisi".
 */
class PekTransmisi extends BasePekTransmisi
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
