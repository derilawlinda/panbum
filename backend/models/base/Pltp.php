<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "pltp".
 *
 * @property string $id
 * @property string $id_wkp
 * @property string $nama_pltp
 * @property string $remark
 * @property string $id_pengembang
 *
 * @property \backend\models\Pengembang $pengembang
 * @property \backend\models\Wkp $wkp
 * @property \backend\models\Unit[] $units
 */
class Pltp extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_wkp', 'id_pengembang'], 'integer'],
            [['nama_pltp', 'remark'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pltp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_wkp' => 'Id Wkp',
            'nama_pltp' => 'Nama Pltp',
            'remark' => 'Remark',
            'id_pengembang' => 'Id Pengembang',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengembang()
    {
        return $this->hasOne(\backend\models\Pengembang::className(), ['id_pengembang' => 'id_pengembang']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWkp()
    {
        return $this->hasOne(\backend\models\Wkp::className(), ['id_wkp' => 'id_wkp']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(\backend\models\Unit::className(), ['id_pltp' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\PltpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PltpQuery(get_called_class());
    }
}
