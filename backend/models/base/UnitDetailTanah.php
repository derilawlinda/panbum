<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "unit_detail_tanah".
 *
 * @property string $id_tanah
 * @property string $id_unit
 * @property double $luas_lahan
 * @property integer $status_luas
 * @property string $status_tanah
 * @property string $status_tahun
 * @property integer $status_status
 * @property string $legalitas
 * @property integer $status_legalitas
 * @property string $input_date
 *
 * @property \backend\models\Unit $unit
 * @property \backend\models\UnitTanahFile[] $unitTanahFiles
 */
class UnitDetailTanah extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit'], 'required'],
            [['id_unit', 'status_luas', 'status_status', 'status_legalitas','status'], 'integer'],
            [['luas_lahan'], 'number'],
            [['status_tahun', 'input_date','file'], 'safe'],
            [['legalitas','status_tanah'], 'string', 'max' => 255],
            [['remark'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_detail_tanah';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tanah' => 'Id Tanah',
            'id_unit' => 'Id Unit',
            'luas_lahan' => 'Luas Lahan',
            'status_luas' => 'Status Luas',
            'status_tanah' => 'Status Tanah',
            'status_tahun' => 'Status Tahun',
            'status_status' => 'Status Status',
            'legalitas' => 'Legalitas',
            'status_legalitas' => 'Status Legalitas',
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
    public function getUnitTanahFiles()
    {
        return $this->hasMany(\backend\models\UnitTanahFile::className(), ['id_tanah' => 'id_tanah']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\UnitDetailTanahQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitDetailTanahQuery(get_called_class());
    }
}
