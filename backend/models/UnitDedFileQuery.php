<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[UnitDedFile]].
 *
 * @see UnitDedFile
 */
class UnitDedFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UnitDedFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UnitDedFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}