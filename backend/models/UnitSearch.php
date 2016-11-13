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
            [['id_unit', 'id_pltp','no_unit'], 'integer'],
            [['tahap', 'prov', 'kabkot'], 'safe'],
            [['investasi', 'potensi', 'rencana'], 'number'],
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
		
        $query = Unit::find()
				->select("unit.id_unit,unit.id_pltp,unit.tahap,unit.investasi,unit.no_unit,unit.potensi,unit.status,unit.rencana,unit.updated_at,unit.created_at,pltp.nama_pltp as pltpname,wkp.nama as namawkp")
				->join('LEFT OUTER JOIN','pltp','pltp.id = unit.id_pltp')
				->join('LEFT OUTER JOIN','wkp','wkp.id_wkp = pltp.id_wkp')
				;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['attributes' => ['namawkp','id_unit','tahap','pltpname','status','no_unit','updated_at','created_at']],
			'pagination' => [
				'pageSize' => 10,
			],
			
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
            'investasi' => $this->investasi,
            'no_unit' => $this->no_unit,
            'potensi' => $this->potensi,
            'rencana' => $this->rencana,
        ]);

        $query->andFilterWhere(['like', 'tahap', $this->tahap])
            ->andFilterWhere(['like', 'prov', $this->prov])
            ->andFilterWhere(['like', 'kabkot', $this->kabkot]);

        return $dataProvider;
    }
	
	public function searchVerifikasi($params)
    {
		
        $query = Unit::find()
				->select("unit.id_unit,unit.id_pltp,unit.tahap,unit.investasi,unit.no_unit,unit.potensi,unit.status,unit.rencana,unit.updated_at,unit.created_at,pltp.nama_pltp as pltpname,wkp.nama as namawkp")
				->join('LEFT OUTER JOIN','pltp','pltp.id = unit.id_pltp')
				->join('LEFT OUTER JOIN','wkp','wkp.id_wkp = pltp.id_wkp')
				->where(["status"=>"S"]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['attributes' => ['namawkp','id_unit','tahap','pltpname','status','no_unit','updated_at','created_at']],
			'pagination' => [
				'pageSize' => 10,
			],
			
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
            'investasi' => $this->investasi,
            'no_unit' => $this->no_unit,
            'potensi' => $this->potensi,
            'rencana' => $this->rencana,
        ]);

        $query->andFilterWhere(['like', 'tahap', $this->tahap])
            ->andFilterWhere(['like', 'prov', $this->prov])
            ->andFilterWhere(['like', 'kabkot', $this->kabkot]);

        return $dataProvider;
    }
}
