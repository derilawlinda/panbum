<?php

namespace backend\models;

use \backend\models\base\Pltp as BasePltp;

/**
 * This is the model class for table "pltp".
 */
class Pltp extends BasePltp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_wkp'], 'integer'],
            [['nama_pltp'], 'string', 'max' => 255]
        ]);
    }
	
}
