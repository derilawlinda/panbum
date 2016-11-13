<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengembang;

/**
 * app\models\PengembangSearch represents the model behind the search form about `app\models\Pengembang`.
 */
 class PengembangSearch extends Pengembang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengembang', 'izin'], 'integer'],
            [['nama', 'alamat', 'dirut', 'user', 'tgl'], 'safe'],
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
            'user' => $this->user,
            'izin' => $this->izin,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'dirut', $this->dirut])
            ->andFilterWhere(['like', 'tgl', $this->tgl]);

        return $dataProvider;
    }
}
