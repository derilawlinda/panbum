<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Waktu]].
 *
 * @see Waktu
 */
class WaktuQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Waktu[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Waktu|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function latestid($id_unit) {

        $query = Waktu::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('created_at DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id_waktu;
        } else {
            return 0;
        }
    }
    
    public function latestidbymonthyear($id_unit,$month,$year)
    {
       
	   $query = Waktu::find()
                                ->select('id_waktu')
				->where(['id_unit' => $id_unit])
                                ->andWhere('DATE_FORMAT(created_at, "%Y-%m") <= '.'"'.$year.'-'.$month.'"')
				->orderBy('created_at DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_waktu;
		}else{
			return 0;
		}
	}

}
