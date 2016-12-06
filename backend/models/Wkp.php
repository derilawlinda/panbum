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
            [['luas'], 'number'],
            [['pem_izin'], 'required'],
            [['nama', 'skwkp', 'lapangan', 'remark', 'pem_izin'], 'string', 'max' => 255]
        ]);
    }
    public function jumlahWkp(){
        $jumlahWkp = Wkp::find()->all();
        return count($jumlahWkp);
        
    }
    
     /**
     * @inheritdoc
     * @return \backend\models\WkpQuery the active query used by this AR class.
     */
    
	
}
