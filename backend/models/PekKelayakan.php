<?php

namespace backend\models;

use \backend\models\base\PekKelayakan as BasePekKelayakan;

/**
 * This is the model class for table "pek_kelayakan".
 */
class PekKelayakan extends BasePekKelayakan
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
