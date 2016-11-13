<?php

namespace backend\models;

use \backend\models\base\UnitTanahFile as BaseUnitTanahFile;

/**
 * This is the model class for table "unit_tanah_file".
 */
class UnitTanahFile extends BaseUnitTanahFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_tanah'], 'required'],
            [['id_tanah'], 'integer'],
            [['uploaded_date'], 'safe'],
            [['nama', 'uploaded_by'], 'string', 'max' => 255]
        ]);
    }
	
}
