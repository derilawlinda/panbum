<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\app\models\PekAccroad]].
 *
 * @see \app\models\PekAccroad
 */
class PekAccroadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\PekAccroad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\PekAccroad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	
	public function latest($id_unit)
    {
       
	   $query = PekAccroad::find()
				->where(['id_unit' => $id_unit])
				->orderBy('submitted_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			$array = $query->getAttributes();
			foreach ($array as $key => $value) {
				$value = trim($value);
				if (empty($value)){
					$array[$key] = "<span class='label label-danger'>No Data</span>";
				}
			}
			return $array;
		}else{
			return array(
				'id_accroad' => "<span class='label label-danger'>No Data</span>",
				'id_unit' => "<span class='label label-danger'>No Data</span>",
				'target' => "<span class='label label-danger'>No Data</span>",
				'capaian' => "<span class='label label-danger'>No Data</span>",
				'remark' => "<span class='label label-danger'>No Data</span>",
				'status' => "<span class='label label-danger'>No Data</span>",
				'submitted_date' => "<span class='label label-danger'>No Data</span>",
				'confirmed_date' => "<span class='label label-danger'>No Data</span>",
				'confirmed' => "<span class='label label-danger'>No Data</span>",
				'file' => null,
			);
		}
	}
	public function latestid($id_unit)
    {
       
	   $query = PekAccroad::find()
				->where(['id_unit' => $id_unit])
				->orderBy('submitted_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_accroad;
		}else{
			return 0;
		}
	}
     public function latestidbymonthyear($id_unit,$month,$year)
    {
       
	   $query = PekAccroad::find()
                                ->select('id_accroad')
				->where(['id_unit' => $id_unit])
                                ->andWhere('DATE_FORMAT(input_date, "%Y-%m") <= '.'"'.$year.'-'.$month.'"')
				->orderBy('input_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_accroad;
		}else{
			return 0;
		}
	}
}