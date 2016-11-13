<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Unit]].
 *
 * @see Unit
 */
class UnitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Unit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Unit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
	
	public function selectdistinct($id_pltp)
    {
        $this->select('no_unit')
			->where(['id_pltp' => $id_pltp])
			->distinct()					
			->asArray();
		return $this->all();
    }
	
	public function idfrompltpandnomor($id_pltp,$no_unit){
		$this->select('id_unit')
			->where(['id_pltp' => $id_pltp])
			->andWhere(['no_unit' => $no_unit])
			->orderBy('created_at DESC')
			->limit(1);
		if($this->count() > 0){
		
			return $this->one()->id_unit;
		
		}else{
			return 0;
		};
			
		
		
	}
	public function countthismonthdata($no_unit,$id_pltp)
    {
        $this->andWhere("MONTH([[created_at]]) = MONTH(NOW())")
		->andWhere("YEAR([[created_at]]) = YEAR(NOW())")
		->andWhere("no_unit = ".$no_unit)
		->andWhere("id_pltp = ".$id_pltp)
		->asArray();
		
		return count($this->all());
    }
        public function updatedidbymonthyear($idunit,$month,$year){
                $model = new Unit();
		$LatedDetailTanahId = $model->getUnitDetailTanahs()->latestidbymonthyear($idunit,$month,$year);
		$LatesrDetailLahanId = $model->getUnitDetailLahans()->latestidbymonthyear($idunit,$month,$year);
		$LatestUnitDetailIzinId =	$model->getUnitDetailIzins()->latestidbymonthyear($idunit,$month,$year);
		$LatestUnitDetailProduksiId = $model->getUnitDetailProduksis()->latestid($idunit);
		$LatestUnitDetailSosialId =	$model->getUnitDetailSosials()->latestid($idunit);
		$LatestPekerjaanGeosainsId =	$model->getPekGeosains()->latestid($idunit);
		$LatestPemboranEksplorasiId =	$model->getPekEksplorasis()->latestid($idunit);
		$LatestStudiKelayakanId =	$model->getPekKelayakans()->latestid($idunit);
		$LatetPpaId =	$model->getPekPpas()->latestid($idunit);
		$LatestUjiSumurId =	$model->getPekUjimonsumurs()->latestid($idunit);
		$latestPengembanganSumurId = $model->getPekPengsumurs()->latestid($idunit);
		$LatestKonstruksiSipilId = $model->getPekKonssipils()->latestid($idunit);
		$LatestAccessRoadId = $model->getPekAccroads()->latestid($idunit);
		$LatestEngineeringId = $model->getPekEngineerings()->latestid($idunit);
		$LatestProcurementId = $model->getPekProcurements()->latestid($idunit);
		$LatestConstructionId = $model->getPekConstructions()->latestid($idunit);
		$LatestOverallepcId = $model->getPekOverallepcs()->latestid($idunit);
		$LaestTransmisiId = $model->getPekTransmisis()->latestid($idunit);
		$LatestCODId = $model->getPekCods()->latestid($idunit); 
		$LatestFotoId = $model->getFotos()->latestid($idunit); 
		$LatestWaktuId = $model->getWaktus()->latestid($idunit);
		$LatestKendalaId = $model->getKendalas()->latestid($idunit);
		return array(
			"idtanah"=>$LatedDetailTanahId,
			"idlahan" => $LatesrDetailLahanId,
			"idizin"=>$LatestUnitDetailIzinId,
			"idproduksi"=>$LatestUnitDetailProduksiId,
			"idsosial"=>$LatestUnitDetailSosialId,
			"idgeosains"=>$LatestPekerjaanGeosainsId,
			"ideksplorasi"=>$LatestPemboranEksplorasiId,
			"idkelayakan"=>$LatestStudiKelayakanId,
			"idppa"=>$LatetPpaId,
			"idsumur"=>$LatestUjiSumurId,
			"idpengsumur"=>$latestPengembanganSumurId,
			"idsipil"=>$LatestKonstruksiSipilId,
			"idaccroad"=>$LatestAccessRoadId,
			"idengineering"=>$LatestEngineeringId,
			"idprocurement"=>$LatestProcurementId,
			"idconstruction"=>$LatestConstructionId,
			"idoverall"=>$LatestOverallepcId,
			"idtransmisi"=>$LaestTransmisiId,
			"idcod"=>$LatestCODId,
			"idfoto"=>$LatestFotoId,
			"idwaktu"=>$LatestWaktuId,
			"idkendala"=>$LatestKendalaId
			
		);    
            
            
        }
	public function updatedid($idunit)
    {
        $model = new Unit();
		$LatedDetailTanahId = $model->getUnitDetailTanahs()->latestid($idunit);
		$LatesrDetailLahanId = $model->getUnitDetailLahans()->latestid($idunit);
		$LatestUnitDetailIzinId =	$model->getUnitDetailIzins()->latestid($idunit);
		$LatestUnitDetailProduksiId = $model->getUnitDetailProduksis()->latestid($idunit);
		$LatestUnitDetailSosialId =	$model->getUnitDetailSosials()->latestid($idunit);
		$LatestPekerjaanGeosainsId =	$model->getPekGeosains()->latestid($idunit);
		$LatestPemboranEksplorasiId =	$model->getPekEksplorasis()->latestid($idunit);
		$LatestStudiKelayakanId =	$model->getPekKelayakans()->latestid($idunit);
		$LatetPpaId =	$model->getPekPpas()->latestid($idunit);
		$LatestUjiSumurId =	$model->getPekUjimonsumurs()->latestid($idunit);
		$latestPengembanganSumurId = $model->getPekPengsumurs()->latestid($idunit);
		$LatestKonstruksiSipilId = $model->getPekKonssipils()->latestid($idunit);
		$LatestAccessRoadId = $model->getPekAccroads()->latestid($idunit);
		$LatestEngineeringId = $model->getPekEngineerings()->latestid($idunit);
		$LatestProcurementId = $model->getPekProcurements()->latestid($idunit);
		$LatestConstructionId = $model->getPekConstructions()->latestid($idunit);
		$LatestOverallepcId = $model->getPekOverallepcs()->latestid($idunit);
		$LaestTransmisiId = $model->getPekTransmisis()->latestid($idunit);
		$LatestCODId = $model->getPekCods()->latestid($idunit); 
		$LatestFotoId = $model->getFotos()->latestid($idunit); 
		$LatestWaktuId = $model->getWaktus()->latestid($idunit);
		$LatestKendalaId = $model->getKendalas()->latestid($idunit);
		return array(
			"idtanah"=>$LatedDetailTanahId,
			"idlahan" => $LatesrDetailLahanId,
			"idizin"=>$LatestUnitDetailIzinId,
			"idproduksi"=>$LatestUnitDetailProduksiId,
			"idsosial"=>$LatestUnitDetailSosialId,
			"idgeosains"=>$LatestPekerjaanGeosainsId,
			"ideksplorasi"=>$LatestPemboranEksplorasiId,
			"idkelayakan"=>$LatestStudiKelayakanId,
			"idppa"=>$LatetPpaId,
			"idsumur"=>$LatestUjiSumurId,
			"idpengsumur"=>$latestPengembanganSumurId,
			"idsipil"=>$LatestKonstruksiSipilId,
			"idaccroad"=>$LatestAccessRoadId,
			"idengineering"=>$LatestEngineeringId,
			"idprocurement"=>$LatestProcurementId,
			"idconstruction"=>$LatestConstructionId,
			"idoverall"=>$LatestOverallepcId,
			"idtransmisi"=>$LaestTransmisiId,
			"idcod"=>$LatestCODId,
			"idfoto"=>$LatestFotoId,
			"idwaktu"=>$LatestWaktuId,
			"idkendala"=>$LatestKendalaId
			
		);
    }
	
}