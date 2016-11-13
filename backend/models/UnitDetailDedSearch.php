<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnitDetailDed;

/**
 * app\models\UnitDetailDedSearch represents the model behind the search form about `app\models\UnitDetailDed`.
 */
 class UnitDetailDedSearch extends UnitDetailDed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ded', 'id_unit', 'status_nama', 'status_alamat', 'status_kontrak', 'status_tgl_ded'], 'integer'],
            [['nama_perencana', 'alamat', 'no_kontrak', 'tgl_awal_ded', 'tgl_akhir_ded', 'input_date'], 'safe'],
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
        $query = UnitDetailDed::find();

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
            'id_ded' => $this->id_ded,
            'id_unit' => $this->id_unit,
            'status_nama' => $this->status_nama,
            'status_alamat' => $this->status_alamat,
            'status_kontrak' => $this->status_kontrak,
            'tgl_awal_ded' => $this->tgl_awal_ded,
            'tgl_akhir_ded' => $this->tgl_akhir_ded,
            'status_tgl_ded' => $this->status_tgl_ded,
            'input_date' => $this->input_date,
        ]);

        $query->andFilterWhere(['like', 'nama_perencana', $this->nama_perencana])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_kontrak', $this->no_kontrak]);

        return $dataProvider;
    }
}
