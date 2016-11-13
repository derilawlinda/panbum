<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "unit_tanah_file".
 *
 * @property string $id
 * @property string $id_tanah
 * @property string $nama
 * @property string $uploaded_date
 * @property string $uploaded_by
 *
 * @property \backend\models\UnitDetailTanah $tanah
 */
class UnitTanahFile extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tanah'], 'required'],
            [['id_tanah'], 'integer'],
            [['uploaded_date'], 'safe'],
            [['nama', 'uploaded_by'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_tanah_file';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tanah' => 'Id Tanah',
            'nama' => 'Nama',
            'uploaded_date' => 'Uploaded Date',
            'uploaded_by' => 'Uploaded By',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTanah()
    {
        return $this->hasOne(\backend\models\UnitDetailTanah::className(), ['id_tanah' => 'id_tanah']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\UnitTanahFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UnitTanahFileQuery(get_called_class());
    }
}
