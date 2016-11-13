<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "unit_detail_sosial".
 *
 * @property string $id_sosial
 * @property string $id_unit
 * @property string $sosial_text
 * @property integer $sosial_status
 * @property string $input_date
 *
 * @property \backend\models\Unit $unit
 */
class UnitDetailSosial extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit'], 'required'],
            [['id_unit', 'sosial_status'], 'integer'],
            [['input_date'], 'safe'],
            [['sosial_text'], 'string', 'max' => 255],
			[['remark'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_detail_sosial';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sosial' => 'Id Sosial',
            'id_unit' => 'Id Unit',
            'sosial_text' => 'Keterangan Sosial',
            'sosial_status' => 'Sosial Status',
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
     * @return \app\models\UnitDetailSosialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitDetailSosialQuery(get_called_class());
    }
}
