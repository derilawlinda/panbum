<?php

namespace backend\models;

use \backend\models\base\PekGeosains as BasePekGeosains;

/**
 * This is the model class for table "pek_geosains".
 */
class PekGeosains extends BasePekGeosains
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
