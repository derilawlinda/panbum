<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "unit".
 *
 * @property string $id_unit
 * @property string $id_pltp
 * @property integer $no_unit
 * @property string $updated_by
 * @property string $created_by
 * @property string $updated_at
 * @property string $created_at
 *
 * @property \backend\models\Foto[] $fotos
 * @property \backend\models\Kendala[] $kendalas
 * @property \backend\models\PekAccroad[] $pekAccroads
 * @property \backend\models\PekCod[] $pekCods
 * @property \backend\models\PekConstruction[] $pekConstructions
 * @property \backend\models\PekEksplorasi[] $pekEksplorasis
 * @property \backend\models\PekEngineering[] $pekEngineerings
 * @property \backend\models\PekGeosains[] $pekGeosains
 * @property \backend\models\PekKelayakan[] $pekKelayakans
 * @property \backend\models\PekKonssipil[] $pekKonssipils
 * @property \backend\models\PekOverallepc[] $pekOverallepcs
 * @property \backend\models\PekPengsumur[] $pekPengsumurs
 * @property \backend\models\PekPpa[] $pekPpas
 * @property \backend\models\PekProcurement[] $pekProcurements
 * @property \backend\models\PekTransmisi[] $pekTransmisis
 * @property \backend\models\PekUjimonsumur[] $pekUjimonsumurs
 * @property \backend\models\Pltp $pltp
 * @property \backend\models\UnitDetail $unitDetail
 * @property \backend\models\UnitDetailIzin[] $unitDetailIzins
 * @property \backend\models\UnitDetailLahan[] $unitDetailLahans
 * @property \backend\models\UnitDetailProduksi[] $unitDetailProduksis
 * @property \backend\models\UnitDetailSosial[] $unitDetailSosials
 * @property \backend\models\UnitDetailTanah[] $unitDetailTanahs
 * @property \backend\models\Waktu[] $waktus
 */
class Unit extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pltp'], 'required'],
            [['id_pltp', 'no_unit'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['updated_by', 'created_by'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_unit' => 'Id Unit',
            'id_pltp' => 'Id Pltp',
            'no_unit' => 'No Unit',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(\backend\models\Foto::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKendalas()
    {
        return $this->hasMany(\backend\models\Kendala::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekAccroads()
    {
        return $this->hasMany(\backend\models\PekAccroad::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekCods()
    {
        return $this->hasMany(\backend\models\PekCod::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekConstructions()
    {
        return $this->hasMany(\backend\models\PekConstruction::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekEksplorasis()
    {
        return $this->hasMany(\backend\models\PekEksplorasi::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekEngineerings()
    {
        return $this->hasMany(\backend\models\PekEngineering::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekGeosains()
    {
        return $this->hasMany(\backend\models\PekGeosains::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekKelayakans()
    {
        return $this->hasMany(\backend\models\PekKelayakan::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekKonssipils()
    {
        return $this->hasMany(\backend\models\PekKonssipil::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekOverallepcs()
    {
        return $this->hasMany(\backend\models\PekOverallepc::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekPengsumurs()
    {
        return $this->hasMany(\backend\models\PekPengsumur::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekPpas()
    {
        return $this->hasMany(\backend\models\PekPpa::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekProcurements()
    {
        return $this->hasMany(\backend\models\PekProcurement::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekTransmisis()
    {
        return $this->hasMany(\backend\models\PekTransmisi::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekUjimonsumurs()
    {
        return $this->hasMany(\backend\models\PekUjimonsumur::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPltp()
    {
        return $this->hasOne(\backend\models\Pltp::className(), ['id' => 'id_pltp']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitDetails()
    {
        return $this->hasOne(\backend\models\UnitDetail::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitDetailIzins()
    {
        return $this->hasMany(\backend\models\UnitDetailIzin::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitDetailLahans()
    {
        return $this->hasMany(\backend\models\UnitDetailLahan::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitDetailProduksis()
    {
        return $this->hasMany(\backend\models\UnitDetailProduksi::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitDetailSosials()
    {
        return $this->hasMany(\backend\models\UnitDetailSosial::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitDetailTanahs()
    {
        return $this->hasMany(\backend\models\UnitDetailTanah::className(), ['id_unit' => 'id_unit']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaktus()
    {
        return $this->hasMany(\backend\models\Waktu::className(), ['id_unit' => 'id_unit']);
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
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\UnitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitQuery(get_called_class());
    }
}
