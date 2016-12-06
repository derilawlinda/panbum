<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Foto]].
 *
 * @see Foto
 */
class FotoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Foto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Foto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	public function latestid($id_unit)
    {
       
	   $query = Foto::find()
				->where(['id_unit' => $id_unit])
				->orderBy('uploaded_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_foto;
		}else{
			return 0;
		}
	}
     public function latestidbymonthyear($id_unit,$month,$year)
    {
       
	   $query = Foto::find()
                                ->select('id_foto')
				->where(['id_unit' => $id_unit])
                                ->andWhere('DATE_FORMAT(uploaded_date, "%Y-%m") <= '.'"'.$year.'-'.$month.'"')
				->orderBy('uploaded_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_foto;
		}else{
			return 0;
		}
	}
        
    public function latestidthismonthyearbyunit($id_unit)
    {
           $year = date("Y");
           $month = date('m');
	   $query = Foto::find()
                                ->select('id_foto')
				->where(['id_unit' => $id_unit])
                                ->andWhere('DATE_FORMAT(uploaded_date, "%Y-%m") = '.'"'.$year.'-'.$month.'"')
				->orderBy('uploaded_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_foto;
		}else{
			return 0;
		}
	}    
}