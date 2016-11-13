<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnitDetailTanah;

/**
 * app\models\UnitDetailTanahSearch represents the model behind the search form about `app\models\UnitDetailTanah`.
 */
 class UnitDetailTanahSearch extends UnitDetailTanah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tanah', 'id_unit', 'status_luas', 'status_status', 'status_legalitas'], 'integer'],
            [['luas_lahan'], 'number'],
            [['status_tanah', 'status_tahun', 'legalitas', 'input_date'], 'safe'],
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
        $query = UnitDetailTanah::find();

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
            'id_tanah' => $this->id_tanah,
            'id_unit' => $this->id_unit,
            'luas_lahan' => $this->luas_lahan,
            'status_luas' => $this->status_luas,
            'status_tahun' => $this->status_tahun,
            'status_status' => $this->status_status,
            'status_legalitas' => $this->status_legalitas,
            'input_date' => $this->input_date,
        ]);

        $query->andFilterWhere(['like', 'status_tanah', $this->status_tanah])
            ->andFilterWhere(['like', 'legalitas', $this->legalitas]);

        return $dataProvider;
    }
}
