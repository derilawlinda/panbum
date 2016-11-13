<?php

namespace backend\models;

use \backend\models\base\UnitDetailProduksi as BaseUnitDetailProduksi;

/**
 * This is the model class for table "unit_detail_produksi".
 */
class UnitDetailProduksi extends BaseUnitDetailProduksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit','status_produksi'], 'integer'],
            [['gas', 'listrik'], 'number'],
            [['udated_at', 'created_at'], 'safe'],
            [['remark'], 'string', 'max' => 255]
        ]);
    }
	
}
