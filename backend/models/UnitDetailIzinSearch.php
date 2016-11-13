<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnitDetailIzin;

/**
 * app\models\UnitDetailIzinSearch represents the model behind the search form about `app\models\UnitDetailIzin`.
 */
 class UnitDetailIzinSearch extends UnitDetailIzin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['izin_id', 'id_unit', 'iup_status', 'ippkh_status', 'imb_status', 'amdal_status', 'imka_status', 'simaksi_status'], 'integer'],
            [['iup_awal', 'iup_akhir', 'iup_file', 'ippkh_awal', 'ippkh_akhir', 'ippkh_file', 'imb_awal', 'imb_akhir', 'imb_file', 'amdal_awal', 'amdal_akhir', 'amdal_file', 'imka_awal', 'imka_akhir', 'imka_file', 'simaksi_awal', 'simaksi_akhir', 'simaksi_file', 'input_date'], 'safe'],
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
        $query = UnitDetailIzin::find();

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
            'izin_id' => $this->izin_id,
            'id_unit' => $this->id_unit,
            'iup_awal' => $this->iup_awal,
            'iup_akhir' => $this->iup_akhir,
            'iup_status' => $this->iup_status,
            'ippkh_awal' => $this->ippkh_awal,
            'ippkh_akhir' => $this->ippkh_akhir,
            'ippkh_status' => $this->ippkh_status,
            'imb_awal' => $this->imb_awal,
            'imb_akhir' => $this->imb_akhir,
            'imb_status' => $this->imb_status,
            'amdal_awal' => $this->amdal_awal,
            'amdal_akhir' => $this->amdal_akhir,
            'amdal_status' => $this->amdal_status,
            'imka_awal' => $this->imka_awal,
            'imka_akhir' => $this->imka_akhir,
            'imka_status' => $this->imka_status,
            'simaksi_awal' => $this->simaksi_awal,
            'simaksi_akhir' => $this->simaksi_akhir,
            'simaksi_status' => $this->simaksi_status,
            'input_date' => $this->input_date,
        ]);

        $query->andFilterWhere(['like', 'iup_file', $this->iup_file])
            ->andFilterWhere(['like', 'ippkh_file', $this->ippkh_file])
            ->andFilterWhere(['like', 'imb_file', $this->imb_file])
            ->andFilterWhere(['like', 'amdal_file', $this->amdal_file])
            ->andFilterWhere(['like', 'imka_file', $this->imka_file])
            ->andFilterWhere(['like', 'simaksi_file', $this->simaksi_file]);

        return $dataProvider;
    }
}
