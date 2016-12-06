<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Unit;

/**
 * backend\models\UnitSearch represents the model behind the search form about `backend\models\Unit`.
 */
 class UnitSearch extends Unit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pltp'], 'required'],
            [['id_pltp', 'no_unit'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['updated_by', 'created_by'], 'string', 'max' => 255]
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
    public function searchAdmin($params) 
    { 
        $query = Unit::find(); 

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
            'id_unit' => $this->id_unit,
            'id_pltp' => $this->id_pltp,
            'no_unit' => $this->no_unit,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider; 
    } 
}
