<?php

namespace backend\models;

use \backend\models\base\UnitDetailDed as BaseUnitDetailDed;

/**
 * This is the model class for table "unit_detail_ded".
 */
class UnitDetailDed extends BaseUnitDetailDed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit', 'status_nama', 'status_alamat', 'status_kontrak', 'status_tgl_ded'], 'integer'],
            [['tgl_awal_ded', 'tgl_akhir_ded', 'input_date'], 'safe'],
            [['nama_perencana', 'alamat', 'no_kontrak'], 'string', 'max' => 255]
        ]);
    }
	
}
