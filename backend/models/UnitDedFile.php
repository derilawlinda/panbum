<?php

namespace backend\models;

use \backend\models\base\UnitDedFile as BaseUnitDedFile;

/**
 * This is the model class for table "unit_ded_file".
 */
class UnitDedFile extends BaseUnitDedFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_ded','uploaded_by'], 'required'],
            [['id_ded'], 'integer'],
            [['uploaded_date'], 'safe'],
            [['nama', 'uploaded_by'], 'string', 'max' => 255]
        ]);
    }
	
}
