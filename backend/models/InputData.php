<?php

namespace backend\models;

use \backend\models\base\InputData as BaseInputData;

/**
 * This is the model class for table "input_data".
 */
class InputData extends BaseInputData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nama_input'], 'required'],
            [['nama_input','category'], 'string', 'max' => 255]
        ]);
    }
	
}
