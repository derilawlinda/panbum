<?php

namespace backend\models;

use \backend\models\base\UnitDetail as BaseUnitDetail;

/**
 * This is the model class for table "unit_detail".
 */
class UnitDetail extends BaseUnitDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_unit'], 'required'],
            [['id_unit', 'no_unit', 'attr_status'], 'integer'],
            [['investasi', 'potensi', 'rencana', 'kap_terpasang'], 'number'],
            [['updated_at', 'created_at'], 'safe'],
            [['tahap', 'prov', 'kabkot', 'updated_by', 'created_by', 'remark', 'saham', 'harga'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
            [['id_unit'], 'unique']
        ]);
    }
    
    public function jumlahInvestasi(){
        
        $jumlahInvestasi = UnitDetail::findBySql("SELECT SUM(investasi) AS jumlahinv
        FROM (
            SELECT
            id_unit,
        investasi From unit_detail t1 where created_at = (select max(created_at) from unit_detail)) AS t2;")->one()->jumlahinv;
        return $jumlahInvestasi;
    }
    
    public function jumlahRencanaKapasitas(){
        
        $jumlahKapasitas = UnitDetail::findBySql("SELECT SUM(rencana) AS jumlahkapasitas
        FROM (
            SELECT 
            id_unit,
        rencana From unit_detail t1 where created_at = (select max(created_at) from unit_detail)) AS t2;")->one()->jumlahkapasitas;
        return $jumlahKapasitas;
    }
    
    public function getMonthAndYear(){
        
        $monthYear = UnitDetail::findBySql("SELECT DISTINCT MONTH(created_at) as bulannum,DATE_FORMAT(created_at,'%M') as bulan, 
YEAR(created_at) as tahun FROM unit ORDER BY tahun DESC, bulannum DESC LIMIT 4;");
        return $monthYear;
        
             
        }
    
    public function jumlahKapTerpasang(){
        
        $jumlahKapasitasTerpasang = UnitDetail::findBySql("SELECT SUM(kap_terpasang) AS jumlahkapterpasang
        FROM (
            SELECT 
            id_unit,
        kap_terpasang From unit_detail t1 where created_at = (select max(created_at) from unit_detail)) AS t2;")->one()->jumlahkapterpasang;
        return $jumlahKapasitasTerpasang;
    }
    
     public function jumlahKapTerpasangMonthly(){
        
        $jumlahKapasitasTerpasangMonthly = UnitDetail::findBySql("SELECT year(created_at) as tahun,month(created_at) as bulan,SUM(kap_terpasang) as kapterpasangmonthly
        FROM unit_detail
        GROUP BY tahun, bulan
        ORDER BY tahun DESC, bulan DESC 
        LIMIT 4;")->all();
        return $jumlahKapasitasTerpasangMonthly;
    }
	
}
