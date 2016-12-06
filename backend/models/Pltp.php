<?php

namespace backend\models;

use \backend\models\base\Pltp as BasePltp;

/**
 * This is the model class for table "pltp".
 */
class Pltp extends BasePltp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_wkp', 'id_pengembang'], 'integer'],
            [['nama_pltp', 'remark'], 'string', 'max' => 255]
        ]);
    }
    
    public function findWkpByUserId($userid)
    {
        $rows = (new \yii\db\Query())
            ->select(['wkp.id_wkp', 'wkp.nama'])
            ->from('pltp')
            ->join('LEFT JOIN', 'wkp', 'pltp.id_wkp = wkp.id_wkp')
            ->where(['id_user' => $userid])
            ->all();
        return $rows;
    }
	
}
