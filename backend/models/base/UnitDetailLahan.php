<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "unit_detail_lahan".
 *
 * @property string $id_lahan
 * @property string $id_unit
 * @property double $hutan_kons
 * @property integer $status_kons
 * @property double $hutan_lin
 * @property integer $status_lin
 * @property double $hutan_prod
 * @property integer $status_prod
 * @property double $area
 * @property integer $status_area
 * @property string $input_date
 *
 * @property \backend\models\Unit $unit
 */
class UnitDetailLahan extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit'], 'required'],
            [['id_unit', 'status_kons', 'status_lin', 'status_prod', 'status_area','status_lahan'], 'integer'],
            [['hutan_kons', 'hutan_lin', 'hutan_prod', 'area'], 'number'],
            [['input_date'], 'safe'],
            [['remark'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_detail_lahan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lahan' => 'Id Lahan',
            'id_unit' => 'Id Unit',
            'hutan_kons' => 'Hutan Konservasi(Ha)',
            'status_kons' => 'Status Kons',
            'hutan_lin' => 'Hutan Lindung(Ha)',
            'status_lin' => 'Status Lin',
            'hutan_prod' => 'Hutan Produksi(Ha)',
            'status_prod' => 'Status Prod',
            'area' => 'Area Penggunaan Lain(Ha)',
            'status_area' => 'Status Area',
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
     * @return \app\models\UnitDetailLahanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitDetailLahanQuery(get_called_class());
    }
}
