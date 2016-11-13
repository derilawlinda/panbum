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
 * @property string $peta
 * @property string $id_pengembang
 *
 * @property \backend\models\Pltp[] $pltps
 * @property \backend\models\Pengembang $pengembang
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
            [['id_pengembang'], 'required'],
            [['id_pengembang'], 'integer'],
            [['nama', 'skwkp', 'lapangan', 'peta','remark'], 'string', 'max' => 255]
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
            'peta' => 'Peta',
            'id_pengembang' => 'Id Pengembang',
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
     * @return \yii\db\ActiveQuery
     */
    public function getPengembang()
    {
        return $this->hasOne(\backend\models\Pengembang::className(), ['id_pengembang' => 'id_pengembang']);
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
