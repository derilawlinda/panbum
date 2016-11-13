<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "pengembang".
 *
 * @property string $id_pengembang
 * @property string $nama
 * @property string $alamat
 * @property string $dirut
 * @property string $user
 * @property string $tgl
 * @property string $izin
 * @property string $remark
 *
 * @property \backend\models\Wkp[] $wkps
 */
class Pengembang extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl'], 'safe'],
            [['nama', 'alamat', 'dirut', 'user', 'izin', 'remark'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengembang';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengembang' => 'Id Pengembang',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'dirut' => 'Dirut',
            'user' => 'User',
            'tgl' => 'Tgl',
            'izin' => 'Izin',
            'remark' => 'Remark',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWkps()
    {
        return $this->hasMany(\backend\models\Wkp::className(), ['id_pengembang' => 'id_pengembang']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\PengembangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PengembangQuery(get_called_class());
    }
}
