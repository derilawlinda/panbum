<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "foto".
 *
 * @property integer $id_foto
 * @property string $id_unit
 * @property string $name
 * @property string $name2
 * @property string $uploaded_date
 *
 * @property \backend\models\Unit $unit
 */
class Foto extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['id_foto', 'id_unit','status'], 'integer'],
            [['uploaded_date','name', 'name2','peta'], 'safe'],
            [['remark'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_foto' => 'Id Foto',
            'id_unit' => 'Id Unit',
            'name' => 'Name',
            'name2' => 'Name2',
            'uploaded_date' => 'Uploaded Date',
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
     * @return \backend\models\FotoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\FotoQuery(get_called_class());
    }
}
