<?php

namespace backend\models;

use \backend\models\base\UnitDetailSosial as BaseUnitDetailSosial;

/**
 * This is the model class for table "unit_detail_sosial".
 */
class UnitDetailSosial extends BaseUnitDetailSosial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit', 'sosial_status'], 'integer'],
            [['input_date'], 'safe'],
            [['sosial_text','remark'], 'string', 'max' => 255]
        ]);
    }
	
}
