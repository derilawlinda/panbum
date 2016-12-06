<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "unit_detail".
 *
 * @property string $id
 * @property string $id_unit
 * @property string $tahap
 * @property double $investasi
 * @property string $prov
 * @property string $kabkot
 * @property integer $no_unit
 * @property double $potensi
 * @property double $rencana
 * @property string $updated_by
 * @property string $created_by
 * @property string $updated_at
 * @property string $created_at
 * @property string $status
 * @property string $remark
 * @property integer $attr_status
 * @property double $kap_terpasang
 * @property string $saham
 * @property string $harga
 *
 * @property \backend\models\Unit $unit
 */
class UnitDetail extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public $id_pltp;
    public $no_unit;
    public $jumlahinv;
    public $jumlahkapasitas;
    public $jumlahkapterpasang;
    public $kapterpasangmonthly;
    public $bulan;
    public $tahun;
    public $bulannum;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit'], 'required'],
            [['id_unit', 'no_unit', 'attr_status'], 'integer'],
            [['investasi', 'potensi', 'rencana', 'kap_terpasang'], 'number'],
            [['updated_at', 'created_at'], 'safe'],
            [['tahap', 'prov', 'kabkot', 'updated_by', 'created_by', 'remark', 'saham', 'harga'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
            [['id_unit'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_detail';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_unit' => 'Id Unit',
            'tahap' => 'Tahap',
            'investasi' => 'Investasi',
            'prov' => 'Prov',
            'kabkot' => 'Kabkot',
            'no_unit' => 'No Unit',
            'potensi' => 'Potensi',
            'rencana' => 'Rencana',
            'status' => 'Status',
            'remark' => 'Remark',
            'attr_status' => 'Attr Status',
            'kap_terpasang' => 'Kap Terpasang',
            'saham' => 'Saham',
            'harga' => 'Harga',
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
     * @return \backend\models\UnitDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitDetailQuery(get_called_class());
    }
}
