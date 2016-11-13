<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "pek_ujimonsumur".
 *
 * @property string $id_ujimonsumur
 * @property string $id_unit
 * @property string $target
 * @property string $capaian
 * @property string $remark
 * @property integer $status
 * @property string $submitted_date
 * @property string $confirmed_date
 * @property integer $confirmed
 * @property string $file
 */
class PekUjimonsumur extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['id_ujimonsumur', 'id_unit', 'status', 'confirmed'], 'integer'],
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
        return 'pek_ujimonsumur';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ujimonsumur' => 'Id Ujimonsumur',
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
     * @inheritdoc
     * @return \app\models\PekUjimonsumurQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PekUjimonsumurQuery(get_called_class());
    }
}
