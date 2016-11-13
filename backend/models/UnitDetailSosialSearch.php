<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnitDetailSosial;

/**
 * app\models\UnitDetailSosialSearch represents the model behind the search form about `app\models\UnitDetailSosial`.
 */
 class UnitDetailSosialSearch extends UnitDetailSosial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sosial', 'id_unit', 'sosial_status'], 'integer'],
            [['sosial_text', 'input_date'], 'safe'],
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
        $query = UnitDetailSosial::find();

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
            'id_sosial' => $this->id_sosial,
            'id_unit' => $this->id_unit,
            'sosial_status' => $this->sosial_status,
            'input_date' => $this->input_date,
        ]);

        $query->andFilterWhere(['like', 'sosial_text', $this->sosial_text]);

        return $dataProvider;
    }
}
