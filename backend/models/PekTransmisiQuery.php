<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PekTransmisi]].
 *
 * @see PekTransmisi
 */
class PekTransmisiQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return PekTransmisi[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PekTransmisi|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function latest($id_unit) {

        $query = PekTransmisi::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('submitted_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            $array = $query->getAttributes();
            foreach ($array as $key => $value) {
                $value = trim($value);
                if (empty($value)) {
                    $array[$key] = "<span class='label label-danger'>No Data</span>";
                }
            }
            return $array;
        } else {
            return array(
                'id_tranismis' => "<span class='label label-danger'>No Data</span>",
                'id_unit' => "<span class='label label-danger'>No Data</span>",
                'target' => "<span class='label label-danger'>No Data</span>",
                'capaian' => "<span class='label label-danger'>No Data</span>",
                'remark' => "<span class='label label-danger'>No Data</span>",
                'status' => "<span class='label label-danger'>No Data</span>",
                'submitted_date' => "<span class='label label-danger'>No Data</span>",
                'confirmed_date' => "<span class='label label-danger'>No Data</span>",
                'confirmed' => "<span class='label label-danger'>No Data</span>",
                'file' => null,
            );
        }
    }

    public function latestid($id_unit) {

        $query = PekTransmisi::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('submitted_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id_transmisi;
        } else {
            return 0;
        }
    }

    public function latestidbymonthyear($id_unit, $month, $year) {

        $query = PekCod::find()
                ->select('id_transmisi')
                ->where(['id_unit' => $id_unit])
                ->andWhere('DATE_FORMAT(submitted_date, "%Y-%m") <= ' . '"' . $year . '-' . $month . '"')
                ->orderBy('submitted_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id_transmisi;
        } else {
            return 0;
        }
    }

}
