<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\app\models\UnitDetailLahan]].
 *
 * @see \app\models\UnitDetailLahan
 */
class UnitDetailLahanQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailLahan[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailLahan|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function latest($id_unit) {

        $query = UnitDetailLahan::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('input_date DESC')
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
                "id_lahan" => "<span class='label label-danger'>No Data</span>",
                "id_unit" => "<span class='label label-danger'>No Data</span>",
                "hutan_kons" => "<span class='label label-danger'>No Data</span>",
                "status_kons" => "<span class='label label-danger'>No Data</span>",
                "hutan_lin" => "<span class='label label-danger'>No Data</span>",
                "status_lin" => "<span class='label label-danger'>No Data</span>",
                "hutan_prod" => "<span class='label label-danger'>No Data</span>",
                "status_prod" => "<span class='label label-danger'>No Data</span>",
                "area" => "<span class='label label-danger'>No Data</span>",
                "status_area" => "<span class='label label-danger'>No Data</span>",
                "input_date" => "<span class='label label-danger'>No Data</span>"
            );
        }
    }

    public function latestid($id_unit) {

        $query = UnitDetailLahan::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('input_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id_lahan;
        } else {
            return 0;
        }
    }

    public function latestidbymonthyear($id_unit, $month, $year) {

        $query = UnitDetailLahan::find()
                ->select('id_lahan')
                ->where(['id_unit' => $id_unit])
                ->andWhere('DATE_FORMAT(input_date, "%Y-%m") <= ' . '"' . $year . '-' . $month . '"')
                ->orderBy('input_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id_lahan;
        } else {
            return 0;
        }
    }

}
