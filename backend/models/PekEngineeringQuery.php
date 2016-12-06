<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PekEngineering]].
 *
 * @see PekEngineering
 */
class PekEngineeringQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PekEngineering[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PekEngineering|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	public function latestid($id_unit)
    {
       
	   $query = PekEngineering::find()
				->where(['id_unit' => $id_unit])
				->orderBy('submitted_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id;
		}else{
			return 0;
		}
	}
     public function latestidbymonthyear($id_unit,$month,$year)
    {
       
	   $query = PekEngineering::find()
                                ->select('id')
				->where(['id_unit' => $id_unit])
                                ->andWhere('DATE_FORMAT(submitted_date, "%Y-%m") <= '.'"'.$year.'-'.$month.'"')
				->orderBy('submitted_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id;
		}else{
			return 0;
		}
	}
}