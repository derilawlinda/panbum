<?php

namespace backend\models;

use \backend\models\base\PekAccroad as BasePekAccroad;

/**
 * This is the model class for table "pek_accroad".
 */
class PekAccroad extends BasePekAccroad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            
            [['id_accroad', 'id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date'], 'safe'],
            [['target', 'capaian', 'remark', 'file'], 'string', 'max' => 255],
            [['file'], 'safe'],
        ]);
    }
	
}
