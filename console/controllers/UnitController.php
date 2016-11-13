<?php

namespace backend\controllers;

use Yii;
use backend\models\Unit;
use backend\models\UnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnitController implements the CRUD actions for Unit model.
 */
class UnitController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Unit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UnitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unit model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerFoto = new \yii\data\ArrayDataProvider([
            'allModels' => $model->fotos,
        ]);
        $providerPekAccroad = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekAccroads,
        ]);
        $providerPekCod = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekCods,
        ]);
        $providerPekEpc = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekEpcs,
        ]);
        $providerPekGeosains = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekGeosains,
        ]);
        $providerPekKelayakan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekKelayakans,
        ]);
        $providerPekKonssipil = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekKonssipils,
        ]);
        $providerPekPengsumur = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekPengsumurs,
        ]);
        $providerPekTransmisi = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekTransmisis,
        ]);
        $providerUnitDetailDed = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailDeds,
        ]);
        $providerUnitDetailIzin = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailIzins,
        ]);
        $providerUnitDetailLahan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailLahans,
        ]);
        $providerUnitDetailSosial = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailSosials,
        ]);
        $providerUnitDetailTanah = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailTanahs,
        ]);
        $providerWaktu = new \yii\data\ArrayDataProvider([
            'allModels' => $model->waktus,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerFoto' => $providerFoto,
            'providerPekAccroad' => $providerPekAccroad,
            'providerPekCod' => $providerPekCod,
            'providerPekEpc' => $providerPekEpc,
            'providerPekGeosains' => $providerPekGeosains,
            'providerPekKelayakan' => $providerPekKelayakan,
            'providerPekKonssipil' => $providerPekKonssipil,
            'providerPekPengsumur' => $providerPekPengsumur,
            'providerPekTransmisi' => $providerPekTransmisi,
            'providerUnitDetailDed' => $providerUnitDetailDed,
            'providerUnitDetailIzin' => $providerUnitDetailIzin,
            'providerUnitDetailLahan' => $providerUnitDetailLahan,
            'providerUnitDetailSosial' => $providerUnitDetailSosial,
            'providerUnitDetailTanah' => $providerUnitDetailTanah,
            'providerWaktu' => $providerWaktu,
        ]);
    }

    /**
     * Creates a new Unit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Unit();

       $request = Yii::$app->request;
		
		if($request->isPost){
			if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
				return "<div class='alert alert-success'> Data Saved </div>";
			} else {
				return "Internal Error";
			}
		}else{
		
			return $this->renderAjax('create', [
                'model' => $model,
				'wkp_name'=> $wkp_name,
				'id_unit'=> $id_unit,
				'id_wkp'=>$id_wkp,
				'no_unit'=>$no_unit
            ]);
		
		}
    }

    /**
     * Updates an existing Unit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id_unit]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Unit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export Unit information into PDF format.
     * @param string $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerFoto = new \yii\data\ArrayDataProvider([
            'allModels' => $model->fotos,
        ]);
        $providerPekAccroad = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekAccroads,
        ]);
        $providerPekCod = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekCods,
        ]);
        $providerPekEpc = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekEpcs,
        ]);
        $providerPekGeosains = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekGeosains,
        ]);
        $providerPekKelayakan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekKelayakans,
        ]);
        $providerPekKonssipil = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekKonssipils,
        ]);
        $providerPekPengsumur = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekPengsumurs,
        ]);
        $providerPekTransmisi = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pekTransmisis,
        ]);
        $providerUnitDetailDed = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailDeds,
        ]);
        $providerUnitDetailIzin = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailIzins,
        ]);
        $providerUnitDetailLahan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailLahans,
        ]);
        $providerUnitDetailSosial = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailSosials,
        ]);
        $providerUnitDetailTanah = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unitDetailTanahs,
        ]);
        $providerWaktu = new \yii\data\ArrayDataProvider([
            'allModels' => $model->waktus,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerFoto' => $providerFoto,
            'providerPekAccroad' => $providerPekAccroad,
            'providerPekCod' => $providerPekCod,
            'providerPekEpc' => $providerPekEpc,
            'providerPekGeosains' => $providerPekGeosains,
            'providerPekKelayakan' => $providerPekKelayakan,
            'providerPekKonssipil' => $providerPekKonssipil,
            'providerPekPengsumur' => $providerPekPengsumur,
            'providerPekTransmisi' => $providerPekTransmisi,
            'providerUnitDetailDed' => $providerUnitDetailDed,
            'providerUnitDetailIzin' => $providerUnitDetailIzin,
            'providerUnitDetailLahan' => $providerUnitDetailLahan,
            'providerUnitDetailSosial' => $providerUnitDetailSosial,
            'providerUnitDetailTanah' => $providerUnitDetailTanah,
            'providerWaktu' => $providerWaktu,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    
    /**
     * Finds the Unit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Unit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Unit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Foto
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddFoto()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Foto');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formFoto', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PekAccroad
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPekAccroad()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekAccroad');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPekAccroad', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PekCod
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPekCod()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekCod');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPekCod', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PekEpc
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPekEpc()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekEpc');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPekEpc', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PekGeosains
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPekGeosains()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekGeosains');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPekGeosains', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PekKelayakan
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPekKelayakan()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekKelayakan');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPekKelayakan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PekKonssipil
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPekKonssipil()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekKonssipil');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPekKonssipil', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PekPengsumur
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPekPengsumur()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekPengsumur');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPekPengsumur', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PekTransmisi
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPekTransmisi()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekTransmisi');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPekTransmisi', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for UnitDetailDed
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUnitDetailDed()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailDed');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUnitDetailDed', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for UnitDetailIzin
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUnitDetailIzin()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailIzin');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUnitDetailIzin', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for UnitDetailLahan
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUnitDetailLahan()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailLahan');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUnitDetailLahan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for UnitDetailSosial
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUnitDetailSosial()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailSosial');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUnitDetailSosial', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for UnitDetailTanah
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUnitDetailTanah()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailTanah');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUnitDetailTanah', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Waktu
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddWaktu()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Waktu');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formWaktu', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionDownload($file_name,$wkp_name){
		
		$path = Yii::$app->basePath .'/../uploads/'. $wkp_name;
		$file = $path . '/'.$file_name;
		if (file_exists($file)) {
			Yii::$app->response->sendFile($file);
		}else{
			return false;
		}
	
	}
}
