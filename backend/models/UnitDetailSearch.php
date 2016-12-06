<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UnitDetail;

/**
 * backend\models\UnitDetailSearch represents the model behind the search form about `backend\models\UnitDetail`.
 */
 class UnitDetailSearch extends UnitDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_unit', 'no_unit', 'attr_status','id_pltp'], 'integer'],
            [['tahap', 'prov', 'kabkot', 'updated_by', 'created_by', 'updated_at', 'created_at', 'status', 'remark', 'saham', 'harga'], 'safe'],
            [['investasi', 'potensi', 'rencana', 'kap_terpasang'], 'number'],
            [['id_pltp'],'safe']
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
    public function search($params,$iduser)
    {
        $query = UnitDetail::find()
				->select("unit.id_unit,unit.no_unit as no_unit,unit.id_pltp,unit_detail.tahap,unit_detail.investasi,unit_detail.potensi,unit_detail.status,unit_detail.rencana,unit_detail.updated_at,unit_detail.created_at,pltp.nama_pltp as pltpname,wkp.nama as namawkp")
				->join('LEFT OUTER JOIN','unit','unit_detail.id_unit = unit.id_unit')
                                ->join('LEFT OUTER JOIN','pltp','pltp.id = unit.id_pltp')
				->join('LEFT OUTER JOIN','wkp','wkp.id_wkp = pltp.id_wkp')
                                ->where(["pltp.id_user"=>$iduser])
                                
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
            'unit.id_pltp' => $this->id_pltp,
            'investasi' => $this->investasi,
            'unit.no_unit' => $this->no_unit,
            'potensi' => $this->potensi,
            'rencana' => $this->rencana,
        ]);

        $query->andFilterWhere(['like', 'tahap', $this->tahap])
            ->andFilterWhere(['like', 'prov', $this->prov])
            ->andFilterWhere(['like', 'kabkot', $this->kabkot]);

        return $dataProvider;
    }
    
    public function searchPantau($params)
    {
		
        $query = UnitDetail::find()
				->select("unit.id_unit,unit.id_pltp,unit_detail.tahap,unit_detail.investasi,unit_detail.no_unit,unit_detail.potensi,unit_detail.status,unit_detail.rencana,unit_detail.updated_at,unit_detail.created_at,pltp.nama_pltp as pltpname,wkp.nama as namawkp")
				->join('LEFT OUTER JOIN','unit','unit_detail.id_unit = unit.id_unit')
                                ->join('LEFT OUTER JOIN','pltp','pltp.id = unit.id_pltp')
				->join('LEFT OUTER JOIN','wkp','wkp.id_wkp = pltp.id_wkp');
				
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
            'unit.id_pltp' => $this->id_pltp,
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
		
        $query = UnitDetail::find()
				->select("unit.id_unit,unit.id_pltp,unit_detail.tahap,unit_detail.investasi,unit_detail.no_unit,unit_detail.potensi,unit_detail.status,unit_detail.rencana,unit_detail.updated_at,unit_detail.created_at,pltp.nama_pltp as pltpname,wkp.nama as namawkp")
				->join('LEFT OUTER JOIN','unit','unit_detail.id_unit = unit.id_unit')
                                ->join('LEFT OUTER JOIN','pltp','pltp.id = unit.id_pltp')
				->join('LEFT OUTER JOIN','wkp','wkp.id_wkp = pltp.id_wkp')
				->where(["unit_detail.status"=>"S"]);

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
            'unit.id_pltp' => $this->id_pltp,
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
