<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[UnitDetailProduksi]].
 *
 * @see UnitDetailProduksi
 */
class UnitDetailProduksiQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return UnitDetailProduksi[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UnitDetailProduksi|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function latestid($id_unit) {

        $query = UnitDetailProduksi::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('created_at DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id;
        } else {
            return 0;
        }
    }

    public function latestidbymonthyear($id_unit, $month, $year) {

        $query = UnitDetailProduksi::find()
                ->select('id')
                ->where(['id_unit' => $id_unit])
                ->andWhere('DATE_FORMAT(created_date, "%Y-%m") <= ' . '"' . $year . '-' . $month . '"')
                ->orderBy('created_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id;
        } else {
            return 0;
        }
    }

}
