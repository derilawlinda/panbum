<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "pek_transmisi".
 *
 * @property string $id_transmisi
 * @property string $id_unit
 * @property string $target
 * @property string $capaian
 * @property string $remark
 * @property integer $status
 * @property string $submitted_date
 * @property string $confirmed_date
 * @property integer $confirmed
 * @property string $file
 *
 * @property \backend\models\Unit $unit
 */
class PekTransmisi extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit', 'status', 'confirmed'], 'integer'],
            [['submitted_date', 'confirmed_date'], 'safe'],
            [['target', 'capaian', 'remark'], 'string', 'max' => 255],
            [['file'], 'safe']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pek_transmisi';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transmisi' => 'Id Transmisi',
            'id_unit' => 'Id Unit',
            'target' => 'Target',
            'capaian' => 'Capaian',
            'remark' => 'Remark',
            'status' => 'Status',
            'submitted_date' => 'Submitted Date',
            'confirmed_date' => 'Confirmed Date',
            'confirmed' => 'Confirmed',
            'file' => 'File',
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
     * @return \backend\models\PekTransmisiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PekTransmisiQuery(get_called_class());
    }
}
