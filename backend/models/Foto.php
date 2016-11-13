<?php

namespace backend\models;

use \backend\models\base\Foto as BaseFoto;

/**
 * This is the model class for table "foto".
 */
class Foto extends BaseFoto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
           
            [['id_foto', 'id_unit','status'], 'integer'],
            [['uploaded_date','peta','name', 'name2'], 'safe'],
            [['remark'], 'string', 'max' => 255]
        ]);
    }
	
	
}
