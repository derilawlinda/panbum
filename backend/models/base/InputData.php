<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "input_data".
 *
 * @property string $id_input
 * @property string $nama_input
 */
class InputData extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_input'], 'required'],
            [['nama_input','category'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'input_data';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_input' => 'Id Input',
            'nama_input' => 'Nama Input',
			'category' => 'Kategori'
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\InputDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\InputDataQuery(get_called_class());
    }
}
