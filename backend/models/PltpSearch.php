<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pltp;

/**
 * backend\models\PltpSearch represents the model behind the search form about `backend\models\Pltp`.
 */
 class PltpSearch extends Pltp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_wkp', 'id_pengembang'], 'integer'],
            [['nama_pltp', 'remark'], 'safe'],
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
        $query = Pltp::find();

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
            'id' => $this->id,
            'id_wkp' => $this->id_wkp,
            'id_pengembang' => $this->id_pengembang,
        ]);

        $query->andFilterWhere(['like', 'nama_pltp', $this->nama_pltp])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
