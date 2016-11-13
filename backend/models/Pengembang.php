<?php

namespace backend\models;

use \backend\models\base\Pengembang as BasePengembang;

/**
 * This is the model class for table "pengembang".
 */
class Pengembang extends BasePengembang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['tgl'], 'safe'],
            [['nama', 'alamat', 'dirut', 'user', 'izin', 'remark'], 'string', 'max' => 255]
        ]);
    }
	
}
