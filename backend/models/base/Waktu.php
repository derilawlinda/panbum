<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "waktu".
 *
 * @property integer $id_waktu
 * @property string $id_unit
 * @property double $pelelangan_tahun
 * @property string $pelelangan_mulai
 * @property string $pelelangan_akhir
 * @property double $penerbitan_tahun
 * @property string $penerbitan_mulai
 * @property string $penerbitan_akhir
 * @property double $eksplorasi_tahun
 * @property string $eksplorasi_mulai
 * @property string $eksplorasi_akhir
 * @property integer $eksploitasi_tahun
 * @property string $eksploitasi_mulai
 * @property string $eksploitasi_akhir
 * @property double $cod_tahun
 * @property string $cod_mulai
 * @property string $cod_akhir
 *
 * @property \backend\models\Unit $unit
 */
class Waktu extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function afterFind ()
    {
            // convert to display format
		($this->pelelangan_mulai == "1970-01-01" || $this->pelelangan_mulai == "") ? $this->pelelangan_mulai = "" : $this->pelelangan_mulai = date ('d-m-Y', strtotime ($this->pelelangan_mulai));
		($this->pelelangan_akhir == "1970-01-01" || $this->pelelangan_akhir == "") ? $this->pelelangan_akhir = "" : $this->pelelangan_akhir = date ('d-m-Y', strtotime ($this->pelelangan_akhir));
		($this->penerbitan_mulai == "1970-01-01" || $this->penerbitan_mulai == "") ? $this->penerbitan_mulai = "" : $this->penerbitan_mulai = date ('d-m-Y', strtotime ($this->penerbitan_mulai));
		($this->penerbitan_akhir == "1970-01-01" || $this->penerbitan_akhir == "") ? $this->penerbitan_akhir = "" : $this->penerbitan_akhir = date ('d-m-Y', strtotime ($this->penerbitan_akhir));
		($this->eksplorasi_mulai == "1970-01-01" || $this->eksplorasi_mulai == "") ? $this->eksplorasi_mulai = "" : $this->eksplorasi_mulai = date ('d-m-Y', strtotime ($this->eksplorasi_mulai));
		($this->eksplorasi_akhir == "1970-01-01" || $this->eksplorasi_akhir == "") ? $this->eksplorasi_akhir = "" : $this->eksplorasi_akhir = date ('d-m-Y', strtotime ($this->eksplorasi_akhir));
		($this->eksploitasi_mulai == "1970-01-01" || $this->eksploitasi_mulai == "") ? $this->eksploitasi_mulai = "" : $this->eksploitasi_mulai = date ('d-m-Y', strtotime ($this->eksploitasi_mulai));
		($this->eksploitasi_akhir == "1970-01-01" || $this->eksploitasi_akhir == "") ? $this->eksploitasi_akhir = "" : $this->eksploitasi_akhir = date ('d-m-Y', strtotime ($this->eksploitasi_akhir));
		($this->cod_mulai == "1970-01-01" || $this->cod_mulai == "") ? $this->cod_mulai = "" : $this->cod_mulai = date ('d-m-Y', strtotime ($this->cod_mulai));
		($this->cod_akhir == "1970-01-01" || $this->cod_akhir == "") ? $this->cod_akhir = "" : $this->cod_akhir = date ('d-m-Y', strtotime ($this->cod_akhir));
        
        
        
        parent::afterFind();
    }
    public function beforeSave($insert)
    {
        // convert to storage format
        $this->pelelangan_mulai ? $this->pelelangan_mulai = \DateTime::createFromFormat('d-m-Y', $this->pelelangan_mulai)->format('Y-m-d') : "";
        $this->pelelangan_akhir ? $this->pelelangan_akhir = \DateTime::createFromFormat('d-m-Y', $this->pelelangan_akhir)->format('Y-m-d') : "";
        $this->penerbitan_mulai  ? $this->penerbitan_mulai= \DateTime::createFromFormat('d-m-Y', $this->penerbitan_mulai)->format('Y-m-d') : "";
        $this->penerbitan_akhir ? $this->penerbitan_akhir = \DateTime::createFromFormat('d-m-Y', $this->penerbitan_akhir)->format('Y-m-d') : "";
        $this->eksplorasi_mulai  ? $this->eksplorasi_mulai = \DateTime::createFromFormat('d-m-Y', $this->eksplorasi_mulai)->format('Y-m-d') : "";
        $this->eksplorasi_akhir ? $this->eksplorasi_akhir = \DateTime::createFromFormat('d-m-Y', $this->eksplorasi_akhir)->format('Y-m-d') : "";
        $this->eksploitasi_mulai ? $this->eksploitasi_mulai = \DateTime::createFromFormat('d-m-Y', $this->eksploitasi_mulai)->format('Y-m-d') : "";
        $this->eksploitasi_akhir ? $this->eksploitasi_akhir = \DateTime::createFromFormat('d-m-Y', $this->eksploitasi_akhir)->format('Y-m-d') :"";
        $this->cod_mulai ? $this->cod_mulai = \DateTime::createFromFormat('d-m-Y', $this->cod_mulai)->format('Y-m-d'):"";
        $this->cod_akhir ? $this->cod_akhir = \DateTime::createFromFormat('d-m-Y', $this->cod_akhir)->format('Y-m-d'):"";
       
        return parent::beforeSave($insert);
    }
    public function rules()
    {
        return [
            [['id_unit'], 'required'],
            [['remark'], 'string', 'max' => 255],
            [['id_waktu', 'id_unit', 'eksploitasi_tahun','status'], 'integer'],
            [['pelelangan_tahun', 'penerbitan_tahun', 'eksplorasi_tahun', 'cod_tahun'], 'number'],
            [['pelelangan_mulai', 'pelelangan_akhir', 'penerbitan_mulai', 'penerbitan_akhir', 'eksplorasi_mulai', 'eksplorasi_akhir', 'eksploitasi_mulai', 'eksploitasi_akhir', 'cod_mulai', 'cod_akhir','created_at','updated_at'], 'safe']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waktu';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_waktu' => 'Id Waktu',
            'id_unit' => 'Id Unit',
            'pelelangan_tahun' => 'Pelelangan Tahun',
            'pelelangan_mulai' => 'Pelelangan Mulai',
            'pelelangan_akhir' => 'Pelelangan Akhir',
            'penerbitan_tahun' => 'Penerbitan Tahun',
            'penerbitan_mulai' => 'Penerbitan Mulai',
            'penerbitan_akhir' => 'Penerbitan Akhir',
            'eksplorasi_tahun' => 'Eksplorasi Tahun',
            'eksplorasi_mulai' => 'Eksplorasi Mulai',
            'eksplorasi_akhir' => 'Eksplorasi Akhir',
            'eksploitasi_tahun' => 'Eksploitasi Tahun',
            'eksploitasi_mulai' => 'Eksploitasi Mulai',
            'eksploitasi_akhir' => 'Eksploitasi Akhir',
            'cod_tahun' => 'Cod Tahun',
            'cod_mulai' => 'Cod Mulai',
            'cod_akhir' => 'Cod Akhir',
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
     * @return \backend\models\WaktuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\WaktuQuery(get_called_class());
    }
}
