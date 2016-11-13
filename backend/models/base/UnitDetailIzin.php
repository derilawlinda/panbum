<?php

namespace backend\models\base;

use Yii;

/** 
 * This is the base model class for table "unit_detail_izin". 
 * 
 * @property string $izin_id
 * @property string $id_unit
 * @property string $iup_awal
 * @property string $iup_akhir
 * @property string $iup_file
 * @property integer $iup_status
 * @property string $iup_remark
 * @property string $ippkh_awal
 * @property string $ippkh_akhir
 * @property string $ippkh_file
 * @property integer $ippkh_status
 * @property string $ippkh_remark
 * @property string $imb_awal
 * @property string $imb_akhir
 * @property string $imb_file
 * @property integer $imb_status
 * @property string $imb_remark
 * @property string $amdal_awal
 * @property string $amdal_akhir
 * @property string $amdal_file
 * @property integer $amdal_status
 * @property string $amdal_remark
 * @property string $imka_awal
 * @property string $imka_akhir
 * @property string $imka_file
 * @property integer $imka_status
 * @property string $imka_remark
 * @property string $simaksi_awal
 * @property string $simaksi_akhir
 * @property string $simaksi_file
 * @property integer $simaksi_status
 * @property string $simaksi_remark
 * @property string $ijl_awal
 * @property string $ijl_akhir
 * @property string $ijl_file
 * @property integer $ijl_status
 * @property string $ijl_remark
 * @property string $input_date
 * 
 * @property \backend\models\Unit $unit
 * @property \backend\models\UnitIzinFile[] $unitIzinFiles
 */ 
class UnitDetailIzin extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit'], 'required'],
            [['id_unit', 'iup_status', 'ippkh_status', 'imb_status', 'amdal_status', 'imka_status', 'simaksi_status', 'ijl_status','status_izin'], 'integer'],
            [['iup_awal', 'iup_akhir', 'ippkh_awal', 'ippkh_akhir', 'imb_awal', 'imb_akhir', 'amdal_awal', 'amdal_akhir', 'imka_awal', 'imka_akhir', 'simaksi_awal', 'simaksi_akhir', 'ijl_awal', 'ijl_akhir', 'input_date'], 'safe'],
            [['iup_file', 'ippkh_file', 'imb_file', 'amdal_file', 'imka_file', 'simaksi_file', 'ijl_file'], 'safe'],
            [['iup_remark', 'ippkh_remark', 'imb_remark', 'amdal_remark', 'imka_remark', 'simaksi_remark', 'ijl_remark','remark'], 'string', 'max' => 50]
			
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_detail_izin';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() 
    { 
        return [ 
            'izin_id' => 'Izin ID',
            'id_unit' => 'Id Unit',
            'iup_awal' => 'Iup Awal',
            'iup_akhir' => 'Iup Akhir',
            'iup_file' => 'Iup File',
            'iup_status' => 'Iup Status',
            'iup_remark' => 'Iup Remark',
            'ippkh_awal' => 'Ippkh Awal',
            'ippkh_akhir' => 'Ippkh Akhir',
            'ippkh_file' => 'Ippkh File',
            'ippkh_status' => 'Ippkh Status',
            'ippkh_remark' => 'Ippkh Remark',
            'imb_awal' => 'Imb Awal',
            'imb_akhir' => 'Imb Akhir',
            'imb_file' => 'Imb File',
            'imb_status' => 'Imb Status',
            'imb_remark' => 'Imb Remark',
            'amdal_awal' => 'Amdal Awal',
            'amdal_akhir' => 'Amdal Akhir',
            'amdal_file' => 'Amdal File',
            'amdal_status' => 'Amdal Status',
            'amdal_remark' => 'Amdal Remark',
            'imka_awal' => 'Imka Awal',
            'imka_akhir' => 'Imka Akhir',
            'imka_file' => 'Imka File',
            'imka_status' => 'Imka Status',
            'imka_remark' => 'Imka Remark',
            'simaksi_awal' => 'Simaksi Awal',
            'simaksi_akhir' => 'Simaksi Akhir',
            'simaksi_file' => 'Simaksi File',
            'simaksi_status' => 'Simaksi Status',
            'simaksi_remark' => 'Simaksi Remark',
            'ijl_awal' => 'Ijl Awal',
            'ijl_akhir' => 'Ijl Akhir',
            'ijl_file' => 'Ijl File',
            'ijl_status' => 'Ijl Status',
            'ijl_remark' => 'Ijl Remark',
            'input_date' => 'Input Date',
        ]; 
    } 
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(\backend\models\Unit::className(), ['id_unit' => 'id_unit']);
    }
    
	 /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getUnitIzinFiles() 
    { 
        return $this->hasMany(\backend\models\UnitIzinFile::className(), ['id_izin' => 'izin_id']);
    } 
    /**
     * @inheritdoc
     * @return \app\models\UnitDetailIzinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitDetailIzinQuery(get_called_class());
    }
}
