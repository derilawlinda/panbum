<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Waktu;

/**
 * app\models\WaktuSearch represents the model behind the search form about `app\models\Waktu`.
 */
 class WaktuSearch extends Waktu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_waktu', 'id_unit', 'pelelangan_mulai', 'pelelngan_akhir', 'penerbitan_mulai', 'penerbitan_akhir', 'eskplorasi_awal', 'eksplorasi_akhir', 'cod_mulai', 'cod_akhir'], 'integer'],
            [['pelelangan_tahun', 'penerbitan_tahun', 'eksplorasi_tahun', 'cod_tahun'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Waktu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_waktu' => $this->id_waktu,
            'id_unit' => $this->id_unit,
            'pelelangan_tahun' => $this->pelelangan_tahun,
            'pelelangan_mulai' => $this->pelelangan_mulai,
            'pelelngan_akhir' => $this->pelelngan_akhir,
            'penerbitan_tahun' => $this->penerbitan_tahun,
            'penerbitan_mulai' => $this->penerbitan_mulai,
            'penerbitan_akhir' => $this->penerbitan_akhir,
            'eksplorasi_tahun' => $this->eksplorasi_tahun,
            'eskplorasi_awal' => $this->eskplorasi_awal,
            'eksplorasi_akhir' => $this->eksplorasi_akhir,
            'cod_tahun' => $this->cod_tahun,
            'cod_mulai' => $this->cod_mulai,
            'cod_akhir' => $this->cod_akhir,
        ]);

        return $dataProvider;
    }
}
