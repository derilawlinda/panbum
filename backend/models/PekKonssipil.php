<?php

namespace backend\models;

use \backend\models\base\PekKonssipil as BasePekKonssipil;

/**
 * This is the model class for table "pek_konssipil".
 */
class PekKonssipil extends BasePekKonssipil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            
            [['id_konssipil', 'id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date','file'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255]
        ]);
    }
	
}
