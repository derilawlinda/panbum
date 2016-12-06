<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Wkp;

/**
 * backend\models\WkpSearch represents the model behind the search form about `backend\models\Wkp`.
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
            [['nama', 'skwkp', 'lapangan', 'remark', 'pem_izin'], 'safe'],
            [['luas'], 'number'],
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
            'pagination' => [
                'pageSize' => 5
             ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_wkp' => $this->id_wkp,
            'luas' => $this->luas,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'skwkp', $this->skwkp])
            ->andFilterWhere(['like', 'lapangan', $this->lapangan])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'pem_izin', $this->pem_izin]);

        return $dataProvider;
    }
}
