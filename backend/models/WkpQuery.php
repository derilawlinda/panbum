<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Wkp]].
 *
 * @see Wkp
 */
class WkpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Wkp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Wkp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}