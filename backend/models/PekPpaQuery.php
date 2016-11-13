<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PekPpa]].
 *
 * @see PekPpa
 */
class PekPpaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PekPpa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PekPpa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	public function latestid($id_unit)
    {
       
	   $query = PekPpa::find()
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
}