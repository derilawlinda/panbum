<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UnitDetailLahan;

/**
 * app\models\UnitDetailLahanSearch represents the model behind the search form about `app\models\UnitDetailLahan`.
 */
 class UnitDetailLahanSearch extends UnitDetailLahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lahan', 'id_unit', 'status_kons', 'status_lin', 'status_prod', 'status_area'], 'integer'],
            [['hutan_kons', 'hutan_lin', 'hutan_prod', 'area'], 'number'],
            [['input_date'], 'safe'],
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
        $query = UnitDetailLahan::find();

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
            'id_lahan' => $this->id_lahan,
            'id_unit' => $this->id_unit,
            'hutan_kons' => $this->hutan_kons,
            'status_kons' => $this->status_kons,
            'hutan_lin' => $this->hutan_lin,
            'status_lin' => $this->status_lin,
            'hutan_prod' => $this->hutan_prod,
            'status_prod' => $this->status_prod,
            'area' => $this->area,
            'status_area' => $this->status_area,
            'input_date' => $this->input_date,
        ]);

        return $dataProvider;
    }
}
