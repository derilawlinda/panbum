<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wkp;

/**
 * app\models\WkpSearch represents the model behind the search form about `app\models\Wkp`.
 */
 class WkpSearch extends Wkp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_wkp'], 'integer'],
            [['nama', 'lapangan', 'peta'], 'safe'],
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
        $query = Wkp::find();

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
            'id_wkp' => $this->id_wkp,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'lapangan', $this->lapangan])
            ->andFilterWhere(['like', 'peta', $this->peta]);

        return $dataProvider;
    }
}
