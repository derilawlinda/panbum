<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "unit_izin_file".
 *
 * @property string $id
 * @property string $id_izin
 * @property string $nama
 * @property string $uploaded_date
 * @property string $type
 * @property string $iup
 * @property string $ijl
 * @property string $ippkh
 * @property string $imb
 * @property string $amdal
 * @property string $imka
 * @property string $simaksi
 * @property string $updated_at
 *
 * @property \backend\models\UnitDetailIzin $izin
 */
class UnitIzinFile extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_izin', 'nama'], 'required'],
            [['id_izin'], 'integer'],
            [['uploaded_date', 'updated_at'], 'safe'],
            [['nama', 'iup', 'ijl', 'ippkh', 'imb', 'amdal', 'imka', 'simaksi'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_izin_file';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_izin' => 'Id Izin',
            'nama' => 'Nama',
            'uploaded_date' => 'Uploaded Date',
            'type' => 'Type',
            'iup' => 'Iup',
            'ijl' => 'Ijl',
            'ippkh' => 'Ippkh',
            'imb' => 'Imb',
            'amdal' => 'Amdal',
            'imka' => 'Imka',
            'simaksi' => 'Simaksi',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(\backend\models\UnitDetailIzin::className(), ['izin_id' => 'id_izin']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'uploaded_date',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\UnitIzinFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitIzinFileQuery(get_called_class());
    }
}
