<?php

namespace backend\models;

use \backend\models\base\PekEngineering as BasePekEngineering;

/**
 * This is the model class for table "pek_engineering".
 */
class PekEngineering extends BasePekEngineering
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
