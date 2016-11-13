<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\app\models\UnitDetailSosial]].
 *
 * @see \app\models\UnitDetailSosial
 */
class UnitDetailSosialQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailSosial[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailSosial|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function latest($id_unit) {

        $query = UnitDetailSosial::find()
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
                'id_sosial' => "<span class='label label-danger'>No Data</span>",
                'id_unit' => "<span class='label label-danger'>No Data</span>",
                'sosial_text' => "<span class='label label-danger'>No Data</span>",
                'sosial_status' => "<span class='label label-danger'>No Data</span>",
                'input_date' => "<span class='label label-danger'>No Data</span>",
            );
        }
    }

    public function latestid($id_unit) {

        $query = UnitDetailSosial::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('input_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id_sosial;
        } else {
            return 0;
        }
    }

    public function latestidbymonthyear($id_unit, $month, $year) {

        $query = UnitDetailSosial::find()
                ->select('id_sosial')
                ->where(['id_unit' => $id_unit])
                ->andWhere('DATE_FORMAT(inputs_date, "%Y-%m") <= ' . '"' . $year . '-' . $month . '"')
                ->orderBy('input_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->id_sosial;
        } else {
            return 0;
        }
    }

}
