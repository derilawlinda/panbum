<?php

namespace backend\models;

use \backend\models\base\UnitDetailLahan as BaseUnitDetailLahan;

/**
 * This is the model class for table "unit_detail_lahan".
 */
class UnitDetailLahan extends BaseUnitDetailLahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit', 'status_kons', 'status_lin', 'status_prod', 'status_area','status_lahan'], 'integer'],
            [['hutan_kons', 'hutan_lin', 'hutan_prod', 'area'], 'number'],
            [['input_date'], 'safe'],
            [['remark'], 'string', 'max' => 255]
        ]);
    }
	
}
