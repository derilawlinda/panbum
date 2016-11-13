<?php

namespace backend\models;

use \backend\models\base\Waktu as BaseWaktu;

/**
 * This is the model class for table "waktu".
 */
class Waktu extends BaseWaktu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['remark'], 'string', 'max' => 255],
            [['id_waktu', 'id_unit', 'eksploitasi_tahun','status'], 'integer'],
            [['pelelangan_tahun', 'penerbitan_tahun', 'eksplorasi_tahun', 'cod_tahun'], 'number'],
            [['pelelangan_mulai', 'pelelangan_akhir', 'penerbitan_mulai', 'penerbitan_akhir', 'eksplorasi_mulai', 'eksplorasi_akhir', 'eksploitasi_mulai', 'eksploitasi_akhir', 'cod_mulai', 'cod_akhir','created_at','updated_at'], 'safe']
        ]);
    }
	
}
