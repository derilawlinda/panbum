<?php

namespace backend\models;

use \backend\models\base\PekOverallepc as BasePekOverallepc;

/**
 * This is the model class for table "pek_overallepc".
 */
class PekOverallepc extends BasePekOverallepc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date','file'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255]
        ]);
    }
	
}
