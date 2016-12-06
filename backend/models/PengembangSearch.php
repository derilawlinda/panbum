<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pengembang;

/**
 * backend\models\PengembangSearch represents the model behind the search form about `backend\models\Pengembang`.
 */
 class PengembangSearch extends Pengembang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengembang', 'status'], 'integer'],
            [['nama', 'alamat', 'dirut', 'user', 'tgl', 'izin', 'remark'], 'safe'],
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
        $query = Pengembang::find();

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
            'id_pengembang' => $this->id_pengembang,
            'tgl' => $this->tgl,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'dirut', $this->dirut])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'izin', $this->izin])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
