<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\app\models\UnitDetailDed]].
 *
 * @see \app\models\UnitDetailDed
 */
class UnitDetailDedQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailDed[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailDed|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	
	public function latest($id_unit)
    {
       
	   $query = UnitDetailDed::find()
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
				'id_ded' => "<span class='label label-danger'>No Data</span>",
				'id_unit' => "<span class='label label-danger'>No Data</span>",
				'nama_perencana' => "<span class='label label-danger'>No Data</span>",
				'status_nama' => "<span class='label label-danger'>No Data</span>",
				'alamat' => "<span class='label label-danger'>No Data</span>",
				'status_alamat' => "<span class='label label-danger'>No Data</span>",
				'no_kontrak' => "<span class='label label-danger'>No Data</span>",
				'status_kontrak' => "<span class='label label-danger'>No Data</span>",
				'tgl_awal_ded' => "<span class='label label-danger'>No Data</span>",
				'tgl_akhir_ded' => "<span class='label label-danger'>No Data</span>",
				'status_tgl_ded' => "<span class='label label-danger'>No Data</span>",
				'input_date' => "<span class='label label-danger'>No Data</span>",
			);
		}
		
				
			
    }
	public function latestid($id_unit)
    {
       
	   $query = UnitDetailDed::find()
				->where(['id_unit' => $id_unit])
				->orderBy('input_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_ded;
		}else{
			return 0;
		}
	}
}