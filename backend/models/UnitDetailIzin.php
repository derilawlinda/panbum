<?php

namespace backend\models;
use yii\web\UploadedFile;
use Yii;

use \backend\models\base\UnitDetailIzin as BaseUnitDetailIzin;

/**
 * This is the model class for table "unit_detail_izin".
 */
class UnitDetailIzin extends BaseUnitDetailIzin
{
    /**
     * @inheritdoc
     */
	
	
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit', 'iup_status', 'ippkh_status', 'imb_status', 'amdal_status', 'imka_status', 'simaksi_status','imb_status','status_izin'], 'integer'],
            [['iup_awal', 'iup_akhir', 'ippkh_awal', 'ippkh_akhir', 'imb_awal', 'imb_akhir', 'amdal_awal', 'amdal_akhir', 'imka_awal', 'imka_akhir', 'simaksi_awal', 'simaksi_akhir', 'ijl_awal', 'ijl_akhir', 'input_date'], 'safe'],
            [['iup_file', 'ippkh_file', 'imb_file', 'amdal_file', 'imka_file', 'simaksi_file','ijl_file'], 'safe'],
            [['iup_remark', 'ippkh_remark', 'imb_remark', 'amdal_remark', 'imka_remark', 'simaksi_remark', 'ijl_remark','remark'], 'string', 'max' => 50]
			
			
        ]);
    }
	
	
}
