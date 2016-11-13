<?php

namespace backend\models;

use \backend\models\base\UnitIzinFile as BaseUnitIzinFile;

/**
 * This is the model class for table "unit_izin_file".
 */
class UnitIzinFile extends BaseUnitIzinFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_izin', 'nama'], 'required'],
            [['id_izin'], 'integer'],
            [['uploaded_date', 'updated_at'], 'safe'],
            [['nama', 'iup', 'ijl', 'ippkh', 'imb', 'amdal', 'imka', 'simaksi'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50]
        ]);
    }
	
}
