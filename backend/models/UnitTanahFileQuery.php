<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[UnitTanahFile]].
 *
 * @see UnitTanahFile
 */
class UnitTanahFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UnitTanahFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UnitTanahFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	public function latestid($id_unit)
    {
       
	   
	   $query = UnitTanahFile::find()
				->where(['id_tanah' => $queryIzin->id_tanah])
				->orderBy('upoaded_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_accroad;
		}else{
			return 0;
		}
	}
}