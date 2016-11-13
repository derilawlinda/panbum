<?php

namespace backend\models;

use \backend\models\base\Kendala as BaseKendala;

/**
 * This is the model class for table "kendala".
 */
class Kendala extends BaseKendala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit', 'status'], 'integer'],
            [['submitted_date'], 'safe'],
            [['kendala', 'penyelesaian','remark'], 'string', 'max' => 255]
        ]);
    }
	
}
