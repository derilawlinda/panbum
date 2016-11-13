<?php

namespace backend\controllers;
use yii;
use yii\helpers\ArrayHelper;
use backend\models\Wkp;
use backend\models\Unit;
use backend\models\InputData;
use backend\models\UnitDetailTanah;
use backend\models\UnitDetailLahan;
use backend\models\UnitDetailDed;
use backend\models\UnitDetailIzin;
use backend\models\UnitDetailSosial;
use backend\models\PekGeosains;
use backend\models\PekEksplorasi;
use backend\models\PekKelayakan;
use backend\models\PekUjimonsumur;
use backend\models\PekPengsumur;
use backend\models\PekKonssipil;
use backend\models\PekAccroad;
use backend\models\PekEpc;
use backend\models\PekTransmisi;
use backend\models\PekCod;

class InputDataController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Wkp();
		$unitModel = new Unit();
		$modelInputData = new InputData();
		$inputDataList = ArrayHelper::map(InputData::find()->all(), 'id_input', 'nama_input','category');
		$wkpList = ArrayHelper::map(Wkp::find()->all(), 'id_wkp', 'nama');
		return $this->render('index',['model'=>$model,'wkpList'=>$wkpList,'unitModel'=>$unitModel,'inputDataModel'=>$modelInputData,'inputDataList'=>$inputDataList]);
		
    }

	public function actionGetunitbywkp()
	{
		$request = Yii::$app->request;
		if ($id = $request->get('id_wkp')) {
			
			$unitModel = new Unit();
			$unitCount = Unit::find()
				->where(['id_wkp' => $id])
				->count();
	 
			if ($unitCount > 0) {
				$units = Unit::find()
					->where(['id_wkp' => $id])
					->all();
				foreach ($units as $unit)
					echo "
					<option value=''>Pilih Unit..</option>
					<option value='" . $unit->id_unit . "'>" . $unit->no_unit . "</option>";
			} else
				echo "<option>-</option>";
	 
		}
	}
	
	
	public function actionGetform()
	{
		
		$request = Yii::$app->request;
		$id_wkp = $request->get('Wkp')['id_wkp'];
		$idInput = $request->get('InputData')['id_input'];
		$id_unit = $request->get('unit')['id_unit'];
		$wkp_name = Wkp::findOne($id_wkp)->nama;
		$no_unit = Unit::findOne($id_unit)->no_unit;
		if($idInput == 1){
			
			/* $model = new UnitDetailTanah();
			return $this->renderAjax("//unit-detail-tanah/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		 */ $model = new UnitDetailTanah();
			return $this->renderAjax("//unit-detail-tanah/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 2){
			$model = new UnitDetailLahan();
			return $this->renderAjax("//unit-detail-lahan/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 3){
			$model = new UnitDetailDed();
			return $this->renderAjax("//unit-detail-ded/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 4){
			$model = new UnitDetailIzin();
			return $this->renderAjax("//unit-detail-izin/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 5){
			$model = new UnitDetailSosial();
			return $this->renderAjax("//unit-detail-sosial/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 6){
			$model = new PekGeosains();
			return $this->renderAjax("//pek-geosains/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 7){
			$model = new PekEksplorasi();
			return $this->renderAjax("//pek-eksplorasi/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 8){
			$model = new PekKelayakan();
			return $this->renderAjax("//pek-kelayakan/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 9){
			$model = new PekUjimonsumur();
			return $this->renderAjax("//pek-ujimonsumur/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 10){
			$model = new PekPengsumur();
			return $this->renderAjax("//pek-pengsumur/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 11){
			$model = new PekKonssipil();
			return $this->renderAjax("//pek-konssipil/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 12){
			$model = new PekAccroad();
			return $this->renderAjax("//pek-accroad/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 13){
			$model = new PekEpc();
			return $this->renderAjax("//pek-epc/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 14){
			$model = new PekTransmisi();
			return $this->renderAjax("//pek-transmisi/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 15){
			$model = new PekCod();
			return $this->renderAjax("//pek-cod/create.php",['model'=>$model,'wkp_name'=>$wkp_name,'id_unit'=>$id_unit,'id_wkp'=>$id_wkp,'no_unit'=>$no_unit]);
		}
		elseif($idInput == 16){
			return Yii::$app->runAction('unit/update', ['id' => $id_unit]);
		}
		elseif($idInput == 17){
			return Yii::$app->runAction("foto/create", ['id_unit' => $id_unit]);
		}
		
		
	}
	
	
	
	
}
