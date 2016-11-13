<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kendala;

/**
 * app\models\KendalaSearch represents the model behind the search form about `app\models\Kendala`.
 */
 class KendalaSearch extends Kendala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kendala', 'id_unit', 'status'], 'integer'],
            [['kendala', 'penyelesaian'], 'safe'],
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
        $query = Kendala::find();

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
            'id_kendala' => $this->id_kendala,
            'id_unit' => $this->id_unit,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'kendala', $this->kendala])
            ->andFilterWhere(['like', 'penyelesaian', $this->penyelesaian]);

        return $dataProvider;
    }
}
