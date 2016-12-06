<?php

namespace backend\models\base;
use yii\behaviors\TimestampBehavior;



/**
 * This is the base model class for table "unit_detail_produksi".
 *
 * @property string $id
 * @property string $id_unit
 * @property double $gas
 * @property double $listrik
 * @property string $remark
 * @property string $udated_at
 * @property string $created_at
 *
 * @property \backend\models\Unit $unit
 */
class UnitDetailProduksi extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
    public $cumuap;
    public $cumlistrik; 
    public $jumlahgas;
    public $jumlahlistrik;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit'], 'required'],
            [['id_unit','status_produksi'], 'integer'],
            [['gas', 'listrik'], 'number'],
            [['udated_at', 'created_at','cumuap','cumlistrik'], 'safe'],
            [['remark'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_detail_produksi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_unit' => 'Id Unit',
            'gas' => 'Gas',
            'listrik' => 'Listrik',
            'remark' => 'Remark',
            'udated_at' => 'Udated At',
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
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => false,
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\UnitDetailProduksiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitDetailProduksiQuery(get_called_class());
    }
}
