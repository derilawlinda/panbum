<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\app\models\UnitDetailTanah]].
 *
 * @see \app\models\UnitDetailTanah
 */
class UnitDetailTanahQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailTanah[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailTanah|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	
	public function latest($id_unit)
    {
       
	   $query = UnitDetailTanah::find()
				->where(['id_unit' => $id_unit])
				->orderBy('input_date DESC')
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
				'id_tanah' => "<span class='label label-danger'>No Data</span>",
				'id_unit' => "<span class='label label-danger'>No Data</span>",
				'luas_lahan' => "<span class='label label-danger'>No Data</span>",
				'status_luas' => "<span class='label label-danger'>No Data</span>",
				'status_tanah' => "<span class='label label-danger'>No Data</span>",
				'status_tahun' => "<span class='label label-danger'>No Data</span>",
				'status_status' => "<span class='label label-danger'>No Data</span>",
				'legalitas' => "<span class='label label-danger'>No Data</span>",
				'status_legalitas' => "<span class='label label-danger'>No Data</span>",
				'input_date' => "<span class='label label-danger'>No Data</span>"
			);
		}
	}
	public function latestid($id_unit)
    {
       
	   $query = UnitDetailTanah::find()
				->where(['id_unit' => $id_unit])
				->orderBy('input_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_tanah;
		}else{
			return 0;
		}
	}
	public function latestidbymonthyear($id_unit,$month,$year)
    {
       
	   $query = UnitDetailTanah::find()
                                ->select('id_tanah')
				->where(['id_unit' => $id_unit])
                                ->andWhere('DATE_FORMAT(input_date, "%Y-%m") <= '.'"'.$year.'-'.$month.'"')
				->orderBy('input_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_tanah;
		}else{
			return 0;
		}
	}
	public function latestfileid($id_unit)
    {
       
	   $query = UnitDetailTanah::find()
				->joinWith(['unitTanahFiles'])
				->where(['id_unit' => $id_unit])
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id;
		}else{
			return 0;
		}
	}
}