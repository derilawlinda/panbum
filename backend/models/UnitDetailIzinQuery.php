<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\app\models\UnitDetailIzin]].
 *
 * @see \app\models\UnitDetailIzin
 */
class UnitDetailIzinQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailIzin[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\UnitDetailIzin|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

    public function latest($id_unit) {

        $query = UnitDetailIzin::find()
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
                'izin_id' => "<span class='label label-danger'>No Data</span>",
                'id_unit' => "<span class='label label-danger'>No Data</span>",
                'iup_awal' => "<span class='label label-danger'>No Data</span>",
                'iup_akhir' => "<span class='label label-danger'>No Data</span>",
                'iupFile' => "<span class='label label-danger'>No Data</span>",
                'iup_file' => null,
                'iup_status' => "<span class='label label-danger'>No Data</span>",
                'ippkh_awal' => "<span class='label label-danger'>No Data</span>",
                'ippkh_akhir' => "<span class='label label-danger'>No Data</span>",
                'ippkh_file' => null,
                'ippkh_status' => "<span class='label label-danger'>No Data</span>",
                'imb_awal' => "<span class='label label-danger'>No Data</span>",
                'imb_akhir' => "<span class='label label-danger'>No Data</span>",
                'imb_file' => null,
                'imb_status' => "<span class='label label-danger'>No Data</span>",
                'amdal_awal' => "<span class='label label-danger'>No Data</span>",
                'amdal_akhir' => "<span class='label label-danger'>No Data</span>",
                'amdal_file' => null,
                'amdal_status' => "<span class='label label-danger'>No Data</span>",
                'imka_awal' => "<span class='label label-danger'>No Data</span>",
                'imka_akhir' => "<span class='label label-danger'>No Data</span>",
                'imka_file' => null,
                'imka_status' => "<span class='label label-danger'>No Data</span>",
                'simaksi_awal' => "<span class='label label-danger'>No Data</span>",
                'simaksi_akhir' => "<span class='label label-danger'>No Data</span>",
                'simaksi_file' => null,
                'simaksi_status' => "<span class='label label-danger'>No Data</span>",
                'input_date' => "<span class='label label-danger'>No Data</span>"
            );
        }
    }

    public function latestid($id_unit) {

        $query = UnitDetailIzin::find()
                ->where(['id_unit' => $id_unit])
                ->orderBy('input_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->izin_id;
        } else {
            return 0;
        }
    }

    public function latestidbymonthyear($id_unit, $month, $year) {

        $query = base\UnitDetailIzin::find()
                ->select('izin_id')
                ->where(['id_unit' => $id_unit])
                ->andWhere('DATE_FORMAT(input_date, "%Y-%m") <= ' . '"' . $year . '-' . $month . '"')
                ->orderBy('input_date DESC')
                ->limit(1)
                ->one();


        if (count($query) > 0) {
            return $query->izin_id;
        } else {
            return 0;
        }
    }

}
