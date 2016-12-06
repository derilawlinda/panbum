<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[UnitDetail]].
 *
 * @see UnitDetail
 */
class UnitDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UnitDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UnitDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    	public function selectdistinct($id_pltp)
    {
        $this->select('no_unit')
			->where(['id_pltp' => $id_pltp])
			->distinct()					
			->asArray();
		return $this->all();
    }
	
	public function idfrompltpandnomor($id_pltp,$no_unit){
		$this->select('id_unit')
			->where(['id_pltp' => $id_pltp])
			->andWhere(['no_unit' => $no_unit])
			->orderBy('created_at DESC')
			->limit(1);
		if($this->count() > 0){
		
			return $this->one()->id_unit;
		
		}else{
			return 0;
		};
			
		
		
	}
	public function countthismonthdata($id_unit)
    {
        $this->andWhere("MONTH([[created_at]]) = MONTH(NOW())")
		->andWhere("YEAR([[created_at]]) = YEAR(NOW())")
		->andWhere("id_unit = ".$id_unit)
		->asArray();
		
		return count($this->all());
    }
    public function latestidbymonthyear($id_unit, $month, $year) {

        $query = base\UnitDetail::find()
                ->select('id')
                ->where(['id_unit' => $id_unit])
                ->andWhere('DATE_FORMAT(created_at, "%Y-%m") <= ' . '"' . $year . '-' . $month . '"')
                ->orderBy('created_at DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id;
        } else {
            return 0;
        }
    }
    
    public function latestid($id_unit)
    {
       
	   $query = UnitDetail::find()
				->where(['id_unit' => $id_unit])
				->orderBy('created_at DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id;
		}else{
			return 0;
		}
	}
}