<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "wkp".
 *
 * @property string $id_wkp
 * @property string $nama
 * @property string $skwkp
 * @property string $lapangan
 * @property string $remark
 * @property double $luas
 * @property string $pem_izin
 *
 * @property \backend\models\Pltp[] $pltps
 */
class Wkp extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['luas'], 'number'],
            [['pem_izin'], 'required'],
            [['nama', 'skwkp', 'lapangan', 'remark', 'pem_izin'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wkp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_wkp' => 'Id Wkp',
            'nama' => 'Nama',
            'skwkp' => 'Skwkp',
            'lapangan' => 'Lapangan',
            'remark' => 'Remark',
            'luas' => 'Luas',
            'pem_izin' => 'Pem Izin',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPltps()
    {
        return $this->hasMany(\backend\models\Pltp::className(), ['id_wkp' => 'id_wkp']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\WkpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\WkpQuery(get_called_class());
    }
    
   
}
