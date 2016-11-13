<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[UnitIzinFile]].
 *
 * @see UnitIzinFile
 */
class UnitIzinFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UnitIzinFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UnitIzinFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	
	public function latestid($id_unit)
    {
       
	   $query = UnitIzinFile::find()
				->where(['uploaded_date' => $id_unit])
				->orderBy('input_date DESC')
				->limit(1)
				->one();
				
		
		if(count($query)>0){
			return $query->id_izin;
		}else{
			return 0;
		}
	}
}