<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Foto;

/**
 * app\models\FotoSearch represents the model behind the search form about `app\models\Foto`.
 */
 class FotoSearch extends Foto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_foto', 'id_unit', 'name'], 'integer'],
            [['uploaded_date'], 'safe'],
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
        $query = Foto::find();

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
            'id_foto' => $this->id_foto,
            'id_unit' => $this->id_unit,
            'name' => $this->name,
            'uploaded_date' => $this->uploaded_date,
        ]);

        return $dataProvider;
    }
}
