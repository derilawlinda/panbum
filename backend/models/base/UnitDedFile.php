<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "unit_ded_file".
 *
 * @property string $id
 * @property string $id_ded
 * @property string $nama
 * @property string $uploaded_date
 * @property string $uploaded_by
 *
 * @property \backend\models\UnitDetailDed $ded
 */
class UnitDedFile extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ded','uploaded_by'], 'required'],
            [['id_ded'], 'integer'],
            [['uploaded_date'], 'safe'],
            [['nama', 'uploaded_by'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_ded_file';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ded' => 'Id Ded',
            'nama' => 'Nama',
            'uploaded_date' => 'Uploaded Date',
            'uploaded_by' => 'Uploaded By',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDed()
    {
        return $this->hasOne(\backend\models\UnitDetailDed::className(), ['id_ded' => 'id_ded']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\UnitDedFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitDedFileQuery(get_called_class());
    }
}
