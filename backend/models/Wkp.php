<?php

namespace backend\models;

use \backend\models\base\Wkp as BaseWkp;

/**
 * This is the model class for table "wkp".
 */
class Wkp extends BaseWkp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_pengembang'], 'required'],
            [['id_pengembang'], 'integer'],
            [['nama', 'skwkp', 'lapangan', 'peta'], 'string', 'max' => 255]
        ]);
    }
	
}
