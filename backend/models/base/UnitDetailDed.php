<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "unit_detail_ded".
 *
 * @property string $id_ded
 * @property string $id_unit
 * @property string $nama_perencana
 * @property integer $status_nama
 * @property string $alamat
 * @property integer $status_alamat
 * @property string $no_kontrak
 * @property integer $status_kontrak
 * @property string $tgl_awal_ded
 * @property string $tgl_akhir_ded
 * @property integer $status_tgl_ded
 * @property string $input_date
 *
 * @property \backend\models\Unit $unit
 */
class UnitDetailDed extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit'], 'required'],
            [['id_unit', 'status_nama', 'status_alamat', 'status_kontrak', 'status_tgl_ded'], 'integer'],
            [['tgl_awal_ded', 'tgl_akhir_ded', 'input_date'], 'safe'],
            [['nama_perencana', 'alamat', 'no_kontrak'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_detail_ded';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ded' => 'Id Ded',
            'id_unit' => 'Id Unit',
            'nama_perencana' => 'Nama Perencana',
            'status_nama' => 'Status Nama',
            'alamat' => 'Alamat',
            'status_alamat' => 'Status Alamat',
            'no_kontrak' => 'No Kontrak',
            'status_kontrak' => 'Status Kontrak',
            'tgl_awal_ded' => 'Tgl Awal Ded',
            'tgl_akhir_ded' => 'Tgl Akhir Ded',
            'status_tgl_ded' => 'Status Tgl Ded',
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
     * @inheritdoc
     * @return \app\models\UnitDetailDedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitDetailDedQuery(get_called_class());
    }
}
