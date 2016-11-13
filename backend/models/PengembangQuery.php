<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\app\models\Pengembang]].
 *
 * @see \app\models\Pengembang
 */
class PengembangQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return \app\models\Pengembang[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Pengembang|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function latestid($id_unit) {

        $query = Pengembang::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('tgl DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id_pengembang;
        } else {
            return 0;
        }
    }
    
    public function latestidbymonthyear($id_unit,$month,$year)
    {
       
	   $query = Pengembang::find()
                                ->select('id_cod')
				->where(['id_unit' => $id_unit])
                                ->andWhere('DATE_FORMAT(submitted_date, "%Y-%m") <= '.'"'.$year.'-'.$month.'"')
				->orderBy('submitted_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_cod;
		}else{
			return 0;
		}
	}

}
