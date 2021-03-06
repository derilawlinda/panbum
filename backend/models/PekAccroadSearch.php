<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PekAccroad;

/**
 * app\models\PekAccroadSearch represents the model behind the search form about `app\models\PekAccroad`.
 */
 class PekAccroadSearch extends PekAccroad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_accroad', 'id_unit', 'status', 'confirmed'], 'integer'],
            [['target', 'capaian', 'remark', 'submitted_date', 'confirmed_date', 'file'], 'safe'],
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
        $query = PekAccroad::find();

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
            'id_accroad' => $this->id_accroad,
            'id_unit' => $this->id_unit,
            'status' => $this->status,
            'submitted_date' => $this->submitted_date,
            'confirmed_date' => $this->confirmed_date,
            'confirmed' => $this->confirmed,
        ]);

        $query->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'capaian', $this->capaian])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
