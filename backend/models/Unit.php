<?php

namespace backend\models;

use \backend\models\base\Unit as BaseUnit;

/**
 * This is the model class for table "unit".
 */
class Unit extends BaseUnit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_pltp'], 'required'],
            [['id_pltp', 'no_unit','attr_status'], 'integer'],
            [['investasi', 'potensi', 'rencana'], 'number'],
            [['updated_at', 'created_at'], 'safe'],
            [['tahap', 'prov', 'kabkot', 'updated_by', 'created_by'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2]
        ]);
    }
	
}
