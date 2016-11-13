<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "kendala".
 *
 * @property string $id_kendala
 * @property string $id_unit
 * @property string $kendala
 * @property string $penyelesaian
 * @property integer $status
 * @property string $submitted_date
 */
class Kendala extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit', 'status'], 'integer'],
            [['submitted_date'], 'safe'],
            [['kendala', 'penyelesaian'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kendala';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kendala' => 'Id Kendala',
            'id_unit' => 'Id Unit',
            'kendala' => 'Kendala',
            'penyelesaian' => 'Penyelesaian',
            'status' => 'Status',
            'submitted_date' => 'Submitted Date',
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\KendalaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\KendalaQuery(get_called_class());
    }
}
