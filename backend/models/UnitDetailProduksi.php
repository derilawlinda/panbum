<?php

namespace backend\models;

use \backend\models\base\UnitDetailProduksi as BaseUnitDetailProduksi;


/**
 * This is the model class for table "unit_detail_produksi".
 */
class UnitDetailProduksi extends BaseUnitDetailProduksi
{
    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit','status_produksi'], 'integer'],
            [['gas', 'listrik'], 'number'],
            [['udated_at', 'created_at','cumuap','cumlistrik'], 'safe'],
            [['remark'], 'string', 'max' => 255]
        ]);
    }
   
    public function countCumulativeUap($tahun, $bulan, $id_unit){
        
        $month = $bulan ? $bulan : date("m");
        $year = $tahun ? $tahun : date("Y");
        $cumulativeUap = UnitDetailProduksi::findBySql("SELECT SUM(gas) AS cumuap FROM unit_detail_produksi
            WHERE MONTH(unit_detail_produksi.created_at) <=".$month."
            AND YEAR(unit_detail_produksi.created_at) =".$year."
            AND id_unit =".$id_unit)->one()->cumuap;
        return $cumulativeUap;
    }
    
    public function countCumulativeListrik($tahun, $bulan, $id_unit){
        
        $month = $bulan ? $bulan : date("m");
        $year = $tahun ? $tahun : date("Y");
        $cumulativeListrik = UnitDetailProduksi::findBySql("SELECT SUM(listrik) AS cumlistrik FROM unit_detail_produksi
            WHERE MONTH(unit_detail_produksi.created_at) <= ".$month."
            AND YEAR(unit_detail_produksi.created_at) = ".$year."
            AND id_unit =".$id_unit)->one()->cumlistrik;
        return $cumulativeListrik;
    }
    public function jumlahGas(){
        
        $year = date("Y");
        $jumlahGas = UnitDetailProduksi::findBySql("SELECT SUM(gas) AS jumlahgas FROM unit_detail_produksi
           WHERE YEAR(unit_detail_produksi.created_at) = ".$year)->one()->jumlahgas;
        return $jumlahGas;
    }
    
    public function jumlahListrik(){
        
        $year = date("Y");
        $jumlahListrik = UnitDetailProduksi::findBySql("SELECT SUM(listrik) AS jumlahlistrik FROM unit_detail_produksi
            WHERE YEAR(unit_detail_produksi.created_at) = ".$year)->one()->jumlahlistrik;
        return $jumlahListrik;
    }
    
    
}
