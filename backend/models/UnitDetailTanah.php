<?php

namespace backend\models;

use \backend\models\base\UnitDetailTanah as BaseUnitDetailTanah;

/**
 * This is the model class for table "unit_detail_tanah".
 */
class UnitDetailTanah extends BaseUnitDetailTanah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit', 'status_luas', 'status_status', 'status_legalitas','status'], 'integer'],
            [['luas_lahan'], 'number'],
            [['status_tahun', 'input_date','file'], 'safe'],
            [['legalitas','remark','status_tanah'], 'string', 'max' => 255]
        ]);
    }
	
}
