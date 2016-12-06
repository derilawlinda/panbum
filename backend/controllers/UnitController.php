<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use backend\models\Unit;
use backend\models\UnitDetail;
use backend\models\UnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Wkp;
use backend\models\Pltp;
use backend\models\UnitDetailTanah;
use backend\models\UnitDetailLahan;
use backend\models\UnitDedFile;
use backend\models\UnitDetailSearch;
use backend\models\UnitDetailIzin;
use backend\models\UnitDetailSosial;
use backend\models\UnitDetailProduksi;
use backend\models\PekGeosains;
use backend\models\PekEksplorasi;
use backend\models\PekKelayakan;
use backend\models\PekUjimonsumur;
use backend\models\PekPengsumur;
use backend\models\PekKonssipil;
use backend\models\PekAccroad;
use backend\models\PekEngineering;
use backend\models\PekConstruction;
use backend\models\PekProcurement;
use backend\models\PekOverallepc;
use backend\models\PekTransmisi;
use backend\models\PekCod;
use backend\models\PekPpa;
use backend\models\Pengembang;
use backend\models\UnitTanahFile;
use backend\models\Foto;
use backend\models\Waktu;
use backend\models\Kendala;
use yii\web\UploadedFile;
use lo\modules\noty\Wrapper;

/**
 * UnitController implements the CRUD actions for Unit model.
 */
class UnitController extends Controller {

    public function behaviors() {
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
    public function actionIndex() {
        $searchModel = new UnitDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,Yii::$app->user->id );

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
    public function actionView($id) {
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
    public function actionCreate() {
        $modelUnit = new Unit();
        $modelUnitDetail = new UnitDetail();
        $modelWkp = new Wkp();
        $modelPltp = new Pltp();
        $modelPengembang = Pengembang::findOne(Yii::$app->request->post('Pengembang')["id_pengembang"]);
        
        $modelTanah = new UnitDetailTanah();
        $modelLahan = new UnitDetailLahan();
        $modelIzin = new UnitDetailIzin();
        $modelSosial = new UnitDetailSosial();
        $modelProduksi = new UnitDetailProduksi();
        $modelPekGeosains = new PekGeosains();
        $modelPekEksplorasi = new PekEksplorasi();
        $modelPekKonssipil = new PekKonssipil();
        $modelPekPpa = new PekPpa();
        $modelPekPengsumur = new PekPengsumur();
        $modelPekAccroad = new PekAccroad();
        $modelPekCod = new PekCod();
        $modelPekKelayakan = new PekKelayakan();
        $modelPekEngineering = new PekEngineering();
        $modelPekConstruction = new PekConstruction();
        $modelPekProcurement = new PekProcurement();
        $modelPekOverallepc = new PekOverallepc();
        $modelPekTransmisi = new PekTransmisi();
        $modelPekUjimonsumur = new PekUjimonsumur();
        $modelFoto = new Foto();
        $modelWaktu = new Waktu();
        $modelKendala = new Kendala();

        if (Yii::$app->request->isPost) {
            $id_wkp = Yii::$app->request->post('Wkp')['id_wkp'];
            $id_pltp = Yii::$app->request->post('Unit')['id_pltp'];
            $id_unit = Yii::$app->request->post('Unit')['id_unit'];
            $wkp_name = Wkp::findOne($id_wkp)->nama;
            $pltp_name = Pltp::findOne($id_pltp)->nama_pltp;


            $files = array(
                array('datafile' => UploadedFile::getInstance($modelTanah, 'file'),
                    'path' => "Akta Tanah",
                    'type' => 'file',
                    'model' => $modelTanah),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'iup_file'),
                    'path' => "Izin",
                    'type' => 'iup_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'ijl_file'),
                    'path' => "Izin",
                    'type' => 'ijl_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'ippkh_file'),
                    'path' => "Izin",
                    'type' => 'ippkh_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'imb_file'),
                    'path' => "Izin",
                    'type' => 'imb_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'amdal_file'),
                    'path' => "Izin",
                    'type' => 'amdal_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'imka_file'),
                    'path' => "Izin",
                    'type' => 'imka_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'simaksi_file'),
                    'path' => "Izin",
                    'type' => 'simaksi_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelPekGeosains, 'file'),
                    'path' => "Penyelidikan Geosains",
                    'type' => 'file',
                    'model' => $modelPekGeosains),
                array('datafile' => UploadedFile::getInstance($modelPekEksplorasi, 'file'),
                    'path' => "Pemboran Sumur Eksplorasi",
                    'type' => 'file',
                    'model' => $modelPekEksplorasi),
                array('datafile' => UploadedFile::getInstance($modelPekKelayakan, 'file'),
                    'path' => "Studi Kelayakan",
                    'type' => 'file',
                    'model' => $modelPekKelayakan),
                array('datafile' => UploadedFile::getInstance($modelPekPpa, 'file'),
                    'path' => "PPA",
                    'type' => 'file',
                    'model' => $modelPekPpa),
                array('datafile' => UploadedFile::getInstance($modelPekUjimonsumur, 'file'),
                    'path' => "Uji Monitoring Sumur",
                    'type' => 'file',
                    'model' => $modelPekUjimonsumur),
                array('datafile' => UploadedFile::getInstance($modelPekPengsumur, 'file'),
                    'path' => "Pengembangan Sumur Eskploitasi",
                    'type' => 'file',
                    'model' => $modelPekPengsumur),
                array('datafile' => UploadedFile::getInstance($modelPekKonssipil, 'file'),
                    'path' => "Konstruksi Sipil",
                    'type' => 'file',
                    'model' => $modelPekKonssipil),
                array('datafile' => UploadedFile::getInstance($modelPekAccroad, 'file'),
                    'path' => "Access Road",
                    'type' => 'file',
                    'model' => $modelPekAccroad),
                array('datafile' => UploadedFile::getInstance($modelPekEngineering, 'file'),
                    'path' => "Engineering",
                    'type' => 'file',
                    'model' => $modelPekEngineering),
                array('datafile' => UploadedFile::getInstance($modelPekProcurement, 'file'),
                    'path' => "Procurement",
                    'type' => 'file',
                    'model' => $modelPekProcurement),
                array('datafile' => UploadedFile::getInstance($modelPekConstruction, 'file'),
                    'path' => "Construction",
                    'type' => 'file',
                    'model' => $modelPekConstruction),
                array('datafile' => UploadedFile::getInstance($modelPekOverallepc, 'file'),
                    'path' => "Overall Progress EPC",
                    'type' => 'file',
                    'model' => $modelPekOverallepc
                ),
                array('datafile' => UploadedFile::getInstance($modelPekTransmisi, 'file'),
                    'path' => "Transmisi",
                    'type' => 'file',
                    'model' => $modelPekTransmisi),
                array('datafile' => UploadedFile::getInstance($modelPekCod, 'file'),
                    'path' => "COD",
                    'type' => 'file',
                    'model' => $modelPekCod),
            );


            if ($modelPengembang->load(Yii::$app->request->post()) && $modelUnitDetail->load(Yii::$app->request->post()) && $modelUnit->load(Yii::$app->request->post()) && $modelProduksi->load(Yii::$app->request->post()) && $modelWaktu->load(Yii::$app->request->post()) && $modelTanah->load(Yii::$app->request->post()) && $modelLahan->load(Yii::$app->request->post()) && $modelIzin->load(Yii::$app->request->post()) && $modelSosial->load(Yii::$app->request->post()) && $modelPekGeosains->load(Yii::$app->request->post()) && $modelPekEksplorasi->load(Yii::$app->request->post()) && $modelPekPengsumur->load(Yii::$app->request->post()) && $modelPekPpa->load(Yii::$app->request->post()) && $modelPekAccroad->load(Yii::$app->request->post()) && $modelPekCod->load(Yii::$app->request->post()) && $modelPekKelayakan->load(Yii::$app->request->post()) && $modelPekKonssipil->load(Yii::$app->request->post()) && $modelPekUjimonsumur->load(Yii::$app->request->post()) && $modelPekEngineering->load(Yii::$app->request->post()) && $modelPekConstruction->load(Yii::$app->request->post()) && $modelPekProcurement->load(Yii::$app->request->post()) && $modelPekOverallepc->load(Yii::$app->request->post()) && $modelPekTransmisi->load(Yii::$app->request->post()) && $modelPekPpa->load(Yii::$app->request->post()) && $modelKendala->load(Yii::$app->request->post())) {


                $modelFoto->remark = Yii::$app->request->post('Foto')["remark"];
                $unit_no = $modelUnit->no_unit;
                $modelUnitDetail->status = "S";
                $modelUnitDetail->id_unit = $id_unit;
                $modelTanah->id_unit = $id_unit;
                $modelLahan->id_unit = $id_unit;
                $modelIzin->id_unit = $id_unit;
                $modelSosial->id_unit = $id_unit;
                $modelPekGeosains->id_unit = $id_unit;
                $modelPekUjimonsumur->id_unit = $id_unit;
                $modelPekEksplorasi->id_unit = $id_unit;
                $modelPekPengsumur->id_unit = $id_unit;
                $modelPekAccroad->id_unit = $id_unit;
                $modelPekCod->id_unit = $id_unit;
                $modelPekKelayakan->id_unit = $id_unit;
                $modelPekPpa->id_unit = $id_unit;
                $modelPekEngineering->id_unit = $id_unit;
                $modelPekConstruction->id_unit = $id_unit;
                $modelPekProcurement->id_unit = $id_unit;
                $modelPekOverallepc->id_unit = $id_unit;
                $modelPekTransmisi->id_unit = $id_unit;
                $modelPekPpa->id_unit = $id_unit;
                $modelPekKonssipil->id_unit = $id_unit;
                $modelFoto->id_unit = $id_unit;
                $modelKendala->id_unit = $id_unit;
                $modelProduksi->id_unit = $id_unit;
                $modelPekPpa->id_unit = $id_unit;
                $modelWaktu->id_unit = $id_unit;
                $folderstoCreate = [
                    "Izin",
                    "Akta Tanah",
                    "Penyelidikan Geosains",
                    "Pemboran Sumur Eksplorasi",
                    "Studi Kelayakan",
                    "PPA",
                    "Uji Monitoring Sumur",
                    "Pengembangan Sumur Eskploitasi",
                    "Konstruksi Sipil",
                    "Access Road",
                    "Engineering",
                    "Procurement",
                    "Construction",
                    "Overall Progress EPC",
                    "Transmisi",
                    "COD"];

                $savePath = Yii::$app->basePath . '/../uploads/' . $wkp_name . '-' . $pltp_name . '-' . $unit_no;
                foreach ($folderstoCreate as $foldertoCreate) {

                    if (!file_exists($savePath . '/' . $foldertoCreate)) {
                        mkdir($savePath . '/' . $foldertoCreate, 0777, true);
                    }
                }
                
                foreach ($files as $file) {
                            if (!empty($file["datafile"])) {
                                $savePath = Yii::$app->basePath . '/../uploads/' . $wkp_name . '-' . $pltp_name . '-' . $unit_no;
                                $file["datafile"]->saveAs($savePath . '/' . $file["path"] . '/' . date('Ymd') . '_' . $file["datafile"]->baseName . '.' . $file["datafile"]->extension);
                                $file["model"][$file["type"]] = date('Ymd') . '_' . $file["datafile"]->name;
                            } elseif (empty($file["datafile"]) && $file["model"]->getOldAttribute($file["type"]) !== null) {
                                $file["model"][$file["type"]] = $file["model"]->getOldAttribute($file["type"]);
                            }
                            
                        }


                if ($modelPengembang->save()) {
                    if (
                            $modelUnitDetail->save() && $modelFoto->save() && $modelPekUjimonsumur->save() && $modelTanah->save() && $modelWaktu->save() && $modelLahan->save() && $modelIzin->save() && $modelSosial->save() && $modelPekGeosains->save() && $modelPekEksplorasi->save() && $modelPekPengsumur->save() && $modelPekAccroad->save() && $modelPekCod->save() && $modelPekKelayakan->save() && $modelPekPpa->save() && $modelPekEngineering->save() && $modelPekConstruction->save() && $modelPekProcurement->save() && $modelPekOverallepc->save() && $modelPekTransmisi->save() && $modelPekPpa->save() && $modelKendala->save() && $modelProduksi->save() && $modelPekKonssipil->save()
                    ) {
                        
                        Yii::$app->session->setFlash('success', 'Data saved');
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return "success";
                    } else {
                        return "saving non unit error";
                    }
                } else {

                    return "failed save wkp";
                }
            } else {

                return "load to model error";
            }
        } else {

            return "redirect";
        }
    }

    public function actionCountThisMonthData() {

        $no_unit = Yii::$app->request->get()['no_unit'];
        $id_pltp = Yii::$app->request->get()['id_pltp'];
        $datacount = Unit::find()->countthismonthdata($no_unit, $id_pltp);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if ($datacount > 0) {
            Yii::$app->session->setFlash('error', 'Sudah ada data untuk bulan ini pada unit tersebut. Lakukan update');
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $datacount;
        } else {
            return $datacount;
        }
    }

    public function actionTes() {
        $model = new UnitDetailProduksi();
        $tes = $model->countCumulativeUap("", "", 1, 1);
        print_r($tes);
    }

    public function actionAdminCreateUnit() {
        $model = new Unit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model = new Unit(); //reset model
        }
        $searchModel = new UnitSearch();
        $dataProvider = $searchModel->searchAdmin(Yii::$app->request->queryParams);

        return $this->render('indexAdmin', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateUnit() {

        $request = Yii::$app->request;

        if ($request->isAjax) {
            $id_unit = $request->get('Unit')["id_unit"];


            $datacount = UnitDetail::find()->countthismonthdata($id_unit);
            if ($datacount > 0) {
                Yii::$app->session->setFlash('error', 'Sudah ada data untuk bulan ini pada unit tersebut. Lakukan update');
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return "Data Exist";
            } else {
                $modelUnit = Unit::findOne($id_unit);
                $idpltp = $modelUnit->id_pltp;
                $idwkp = $modelUnit->pltp->wkp->id_wkp;
                $idpengembang = $modelUnit->pltp->pengembang->id_pengembang;
                $modelPengembang = (Pengembang::findOne($idpengembang) != NULL ? Pengembang::findOne($idpengembang) : new Pengembang() );
                $modelWkp = (Wkp::findOne($idwkp) != NULL ? Wkp::findOne($idwkp) : new Wkp() );
                $modelPltp = (Pltp::findOne($idpltp) != NULL ? Pltp::findOne($idpltp) : new Pltp() );
            }
            $updatedIdArray = Unit::find()->updatedid($id_unit);
            $modelUnitDetail = (UnitDetail::findOne($updatedIdArray["idunitdetail"]) != NULL ? UnitDetail::findOne($updatedIdArray["idunitdetail"]) : new UnitDetail() );
            $modelTanah = (UnitDetailTanah::findOne($updatedIdArray["idtanah"]) != NULL ? UnitDetailTanah::findOne($updatedIdArray["idtanah"]) : new UnitDetailTanah() );
            $modelLahan = (UnitDetailLahan::findOne($updatedIdArray["idlahan"]) != NULL ? UnitDetailLahan::findOne($updatedIdArray["idlahan"]) : new UnitDetailLahan() );
            $modelProduksi = (UnitDetailProduksi::findOne($updatedIdArray["idproduksi"]) != NULL ? UnitDetailProduksi::findOne($updatedIdArray["idproduksi"]) : new UnitDetailProduksi() );
            $modelIzin = (UnitDetailIzin::findOne($updatedIdArray["idizin"]) != NULL ? UnitDetailIzin::findOne($updatedIdArray["idizin"]) : new UnitDetailIzin() );
            $modelSosial = (UnitDetailSosial::findOne($updatedIdArray["idsosial"]) != NULL ? UnitDetailSosial::findOne($updatedIdArray["idtanah"]) : new UnitDetailSosial() );
            $modelPekGeosains = (PekGeoSains::findOne($updatedIdArray["idgeosains"]) != NULL ? PekGeoSains::findOne($updatedIdArray["idgeosains"]) : new PekGeoSains() );
            $modelPekEksplorasi = (PekEksplorasi::findOne($updatedIdArray["ideksplorasi"]) != NULL ? PekEksplorasi::findOne($updatedIdArray["ideksplorasi"]) : new PekEksplorasi() );
            $modelPekKonssipil = (PekKonssipil::findOne($updatedIdArray["idsipil"]) != NULL ? PekKonssipil::findOne($updatedIdArray["idsipil"]) : new PekKonssipil() );
            $modelPekPengsumur = (PekPengsumur::findOne($updatedIdArray["idpengsumur"]) != NULL ? PekPengsumur::findOne($updatedIdArray["idpengsumur"]) : new PekPengsumur() );
            $modelPekAccroad = (PekAccroad::findOne($updatedIdArray["idaccroad"]) != NULL ? PekAccroad::findOne($updatedIdArray["idaccroad"]) : new PekAccroad() );
            $modelPekCod = (PekCod::findOne($updatedIdArray["idcod"]) != NULL ? PekCod::findOne($updatedIdArray["idcod"]) : new PekCod() );
            $modelPekKelayakan = (PekKelayakan::findOne($updatedIdArray["idkelayakan"]) != NULL ? PekKelayakan::findOne($updatedIdArray["idkelayakan"]) : new PekKelayakan() );
            $modelPekEngineering = (PekEngineering::findOne($updatedIdArray["idengineering"]) != NULL ? PekEngineering::findOne($updatedIdArray["idengineering"]) : new PekEngineering() );
            $modelPekConstruction = (PekConstruction::findOne($updatedIdArray["idconstruction"]) != NULL ? PekConstruction::findOne($updatedIdArray["idconstruction"]) : new PekConstruction() );
            $modelPekProcurement = (PekProcurement::findOne($updatedIdArray["idprocurement"]) != NULL ? PekProcurement::findOne($updatedIdArray["idprocurement"]) : new PekProcurement() );
            $modelPekOverallepc = (PekOverallepc::findOne($updatedIdArray["idoverall"]) != NULL ? PekOverallepc::findOne($updatedIdArray["idoverall"]) : new PekOverallepc() );
            $modelPekTransmisi = (PekTransmisi::findOne($updatedIdArray["idtransmisi"]) != NULL ? PekTransmisi::findOne($updatedIdArray["idtransmisi"]) : new PekTransmisi() );
            $modelPekUjimonsumur = (PekUjimonsumur::findOne($updatedIdArray["idsumur"]) != NULL ? PekUjimonsumur::findOne($updatedIdArray["idsumur"]) : new PekUjimonsumur() );
            $modelPekPpa = (PekPpa::findOne($updatedIdArray["idppa"]) != NULL ? PekPpa::findOne($updatedIdArray["idppa"]) : new PekPpa() );
            $modelFoto = (Foto::findOne($updatedIdArray["idfoto"]) != NULL ? Foto::findOne($updatedIdArray["idfoto"]) : new Foto() );
            $modelWaktu = (Waktu::findOne($updatedIdArray["idwaktu"]) != NULL ? Foto::findOne($updatedIdArray["idwaktu"]) : new Waktu() );
            $modelKendala = (Kendala::findOne($updatedIdArray["idkendala"]) != NULL ? Kendala::findOne($updatedIdArray["idkendala"]) : new Kendala() );
            $wkpList = ArrayHelper::map(Wkp::find()->all(), 'id_wkp', 'nama');

            return $this->renderAjax('_formCreate', [
                        'id_unit' => $id_unit,
                        'id_pengembang'=>$idpengembang,
                        'modelUnitDetail' => $modelUnitDetail,
                        'modelUnit' => $modelUnit,
                        'modelWkp' => $modelWkp,
                        'modelPltp' => $modelPltp,
                        'modelUnit' => $modelUnit,
                        'modelPengembang' => $modelPengembang,
                        'modelTanah' => $modelTanah,
                        'modelLahan' => $modelLahan,
                        'modelProduksi' => $modelProduksi,
                        'modelIzin' => $modelIzin,
                        'modelSosial' => $modelSosial,
                        'modelPekGeosains' => $modelPekGeosains,
                        'modelPekEksplorasi' => $modelPekEksplorasi,
                        'modelPekKonssipil' => $modelPekKonssipil,
                        'modelPekPengsumur' => $modelPekPengsumur,
                        'modelPekAccroad' => $modelPekAccroad,
                        'modelPekCod' => $modelPekCod,
                        'modelPekKelayakan' => $modelPekKelayakan,
                        'modelPekConstruction' => $modelPekConstruction,
                        'modelPekOverallepc' => $modelPekOverallepc,
                        'modelPekTransmisi' => $modelPekTransmisi,
                        'modelPekUjimonsumur' => $modelPekUjimonsumur,
                        'modelPekPpa' => $modelPekPpa,
                        'modelPekEngineering' => $modelPekEngineering,
                        'modelPekProcurement' => $modelPekProcurement,
                        'modelFoto' => $modelFoto,
                        'modelWaktu' => $modelWaktu,
                        'modelKendala' => $modelKendala
            ]);
        } else {
            $modelPltp = new Pltp();
            $wkpList = ArrayHelper::map($modelPltp->findWkpByUserId(Yii::$app->user->id), 'id_wkp', 'nama');
            $modelWkp = new Wkp();
            $modelUnit = new Unit();

            return $this->render("_formPickUnit", [
                        'wkpList' => $wkpList,
                        'modelWkp' => $modelWkp,
                        'modelUnit' => $modelUnit
            ]);
        }
    }

    public function actionGetpltpbywkp() {
        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $session->set('id_wkp', $request->get('id_wkp'));
        $id = $request->get('id_wkp');
        $pltpCount = Pltp::find()
                ->where(['id_wkp' => $id])
                ->count();
        if ($pltpCount > 0) {
            $pltps = Pltp::find()
                    ->where(['id_wkp' => $id])
                    ->all();
            echo "<option value=''>Pilih PLTP..</option>";
            foreach ($pltps as $pltp)
                echo "<option value='" . $pltp->id . "'>" . $pltp->nama_pltp . "</option>";
        } else
            echo "<option>-</option>";
    }

    public function actionGetUnitByPltp() {
        $request = Yii::$app->request;
        if ($id = $request->get('id_pltp')) {


            $unitCount = Unit::find()
                    ->select('no_unit')
                    ->where(['id_pltp' => $id])
                    ->distinct()
                    ->count();

            if ($unitCount > 0) {
                $units = Unit::find()
                        ->select('id_unit,no_unit')
                        ->where(['id_pltp' => $id])
                        ->distinct()
                        ->all();
                echo "<option value=''>Pilih Unit..</option>";

                foreach ($units as $unit)
                    echo "<option value='" . $unit->id_unit . "'>" . $unit->no_unit . "</option>";
            } else
                echo "<option>-</option>";
        }
    }

    public function actionVerifikasi() {

        $request = Yii::$app->request;
        $searchModel = new UnitDetailSearch();
        $dataProvider = $searchModel->searchVerifikasi(Yii::$app->request->queryParams);

        return $this->render('indexVerifikasi', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCoba() {
        $request = Yii::$app->request;
        $id_unit = $request->get('id_unit');
        $modelUnit = $this->findModel($id_unit);
        $idpltp = $modelUnit->pltp->id;
        $idwkp = $modelUnit->pltp->wkp->id_wkp;
        $idpengembang = $modelUnit->pltp->wkp->pengembang->id_pengembang;
        $modelPengembang = (Pengembang::findOne($idpengembang) != NULL ? Pengembang::findOne($idpengembang) : new Pengembang() );
        $modelPengembang->remark = "aaa";
        print_r($modelPengembang);
    }

    public function actionVerifikasiData() {

        $request = Yii::$app->request;
        $id_unit = $request->get('id_unit');
        $modelUnit = $this->findModel($id_unit);
        $modelPltp = new Pltp();
        $wkpList = ArrayHelper::map($modelPltp->findWkpByUserId(Yii::$app->user->id), 'id_wkp', 'nama');

        $idpltp = $modelUnit->pltp->id;
        $idwkp = $modelUnit->pltp->wkp->id_wkp;
        $idpengembang = $modelUnit->pltp->pengembang->id_pengembang;

        $modelPengembang = (Pengembang::findOne($idpengembang) != NULL ? Pengembang::findOne($idpengembang) : new Pengembang() );
        $modelWkp = (Wkp::findOne($idwkp) != NULL ? Wkp::findOne($idwkp) : new Wkp() );
        $modelPltp = (Pltp::findOne($idpltp) != NULL ? Pltp::findOne($idpltp) : new Pltp() );

        $modelUnitDetail = (UnitDetail::findOne(Unit::find()->updatedid($id_unit)["idunitdetail"]) != NULL ? UnitDetail::findOne(Unit::find()->updatedid($id_unit)["idunitdetail"]) : new UnitDetail() );
        $modelTanah = (UnitDetailTanah::findOne(Unit::find()->updatedid($id_unit)["idtanah"]) != NULL ? UnitDetailTanah::findOne(Unit::find()->updatedid($id_unit)["idtanah"]) : new UnitDetailTanah() );
        $modelLahan = (UnitDetailLahan::findOne(Unit::find()->updatedid($id_unit)["idlahan"]) != NULL ? UnitDetailLahan::findOne(Unit::find()->updatedid($id_unit)["idlahan"]) : new UnitDetailLahan() );
        $modelProduksi = (UnitDetailProduksi::findOne(Unit::find()->updatedid($id_unit)["idproduksi"]) != NULL ? UnitDetailProduksi::findOne(Unit::find()->updatedid($id_unit)["idproduksi"]) : new UnitDetailProduksi() );
        $modelIzin = (UnitDetailIzin::findOne(Unit::find()->updatedid($id_unit)["idizin"]) != NULL ? UnitDetailIzin::findOne(Unit::find()->updatedid($id_unit)["idizin"]) : new UnitDetailIzin() );
        $modelSosial = (UnitDetailSosial::findOne(Unit::find()->updatedid($id_unit)["idsosial"]) != NULL ? UnitDetailSosial::findOne(Unit::find()->updatedid($id_unit)["idtanah"]) : new UnitDetailSosial() );
        $modelPekGeosains = (PekGeoSains::findOne(Unit::find()->updatedid($id_unit)["idgeosains"]) != NULL ? PekGeoSains::findOne(Unit::find()->updatedid($id_unit)["idgeosains"]) : new PekGeoSains() );
        $modelPekEksplorasi = (PekEksplorasi::findOne(Unit::find()->updatedid($id_unit)["ideksplorasi"]) != NULL ? PekEksplorasi::findOne(Unit::find()->updatedid($id_unit)["ideksplorasi"]) : new PekEksplorasi() );
        $modelPekKonssipil = (PekKonssipil::findOne(Unit::find()->updatedid($id_unit)["idsipil"]) != NULL ? PekKonssipil::findOne(Unit::find()->updatedid($id_unit)["idsipil"]) : new PekKonssipil() );
        $modelPekPengsumur = (PekPengsumur::findOne(Unit::find()->updatedid($id_unit)["idpengsumur"]) != NULL ? PekPengsumur::findOne(Unit::find()->updatedid($id_unit)["idpengsumur"]) : new PekPengsumur() );
        $modelPekAccroad = (PekAccroad::findOne(Unit::find()->updatedid($id_unit)["idaccroad"]) != NULL ? PekAccroad::findOne(Unit::find()->updatedid($id_unit)["idaccroad"]) : new PekAccroad() );
        $modelPekCod = (PekCod::findOne(Unit::find()->updatedid($id_unit)["idcod"]) != NULL ? PekCod::findOne(Unit::find()->updatedid($id_unit)["idcod"]) : new PekCod() );
        $modelPekKelayakan = (PekKelayakan::findOne(Unit::find()->updatedid($id_unit)["idkelayakan"]) != NULL ? PekKelayakan::findOne(Unit::find()->updatedid($id_unit)["idkelayakan"]) : new PekKelayakan() );
        $modelPekEngineering = (PekEngineering::findOne(Unit::find()->updatedid($id_unit)["idengineering"]) != NULL ? PekEngineering::findOne(Unit::find()->updatedid($id_unit)["idengineering"]) : new PekEngineering() );
        $modelPekConstruction = (PekConstruction::findOne(Unit::find()->updatedid($id_unit)["idconstruction"]) != NULL ? PekConstruction::findOne(Unit::find()->updatedid($id_unit)["idconstruction"]) : new PekConstruction() );
        $modelPekProcurement = (PekProcurement::findOne(Unit::find()->updatedid($id_unit)["idprocurement"]) != NULL ? PekProcurement::findOne(Unit::find()->updatedid($id_unit)["idprocurement"]) : new PekProcurement() );
        $modelPekOverallepc = (PekOverallepc::findOne(Unit::find()->updatedid($id_unit)["idoverall"]) != NULL ? PekOverallepc::findOne(Unit::find()->updatedid($id_unit)["idoverall"]) : new PekOverallepc() );
        $modelPekTransmisi = (PekTransmisi::findOne(Unit::find()->updatedid($id_unit)["idtransmisi"]) != NULL ? PekTransmisi::findOne(Unit::find()->updatedid($id_unit)["idtransmisi"]) : new PekTransmisi() );
        $modelPekUjimonsumur = (PekUjimonsumur::findOne(Unit::find()->updatedid($id_unit)["idsumur"]) != NULL ? PekUjimonsumur::findOne(Unit::find()->updatedid($id_unit)["idsumur"]) : new PekUjimonsumur() );
        $modelPekPpa = (PekPpa::findOne(Unit::find()->updatedid($id_unit)["idppa"]) != NULL ? PekPpa::findOne(Unit::find()->updatedid($id_unit)["idppa"]) : new PekPpa() );
        $modelFoto = (Foto::findOne(Unit::find()->updatedid($id_unit)["idfoto"]) != NULL ? Foto::findOne(Unit::find()->updatedid($id_unit)["idfoto"]) : new Foto() );
        $modelWaktu = (Waktu::findOne(Unit::find()->updatedid($id_unit)["idwaktu"]) != NULL ? Waktu::findOne(Unit::find()->updatedid($id_unit)["idwaktu"]) : new Waktu() );
        $modelKendala = (Kendala::findOne(Unit::find()->updatedid($id_unit)["idkendala"]) != NULL ? Kendala::findOne(Unit::find()->updatedid($id_unit)["idkendala"]) : new Kendala() );
        
        $pltpList = ArrayHelper::map(Pltp::find()->all(), 'id', 'nama_pltp');
        $unitList = ArrayHelper::map(Unit::find()->selectdistinct($idpltp), 'no_unit', 'no_unit');
        if ($request->isPost) {
            if ($modelUnitDetail->load(Yii::$app->request->post()) && $modelPengembang->load(Yii::$app->request->post()) && $modelWaktu->load(Yii::$app->request->post()) && $modelTanah->load(Yii::$app->request->post()) && $modelLahan->load(Yii::$app->request->post()) && $modelProduksi->load(Yii::$app->request->post()) && $modelIzin->load(Yii::$app->request->post()) && $modelSosial->load(Yii::$app->request->post()) && $modelPekGeosains->load(Yii::$app->request->post()) && $modelPekEksplorasi->load(Yii::$app->request->post()) && $modelPekKelayakan->load(Yii::$app->request->post()) && $modelPekPpa->load(Yii::$app->request->post()) && $modelPekUjimonsumur->load(Yii::$app->request->post()) && $modelPekPengsumur->load(Yii::$app->request->post()) && $modelPekKonssipil->load(Yii::$app->request->post()) && $modelPekAccroad->load(Yii::$app->request->post()) && $modelPekEngineering->load(Yii::$app->request->post()) && $modelPekProcurement->load(Yii::$app->request->post()) && $modelPekConstruction->load(Yii::$app->request->post()) && $modelPekOverallepc->load(Yii::$app->request->post()) && $modelPekTransmisi->load(Yii::$app->request->post()) && $modelPekCod->load(Yii::$app->request->post()) && $modelPekPpa->load(Yii::$app->request->post()) && $modelFoto->load(Yii::$app->request->post()) && $modelKendala->load(Yii::$app->request->post())
            ) {


                if ($modelPengembang->status && $modelUnitDetail->attr_status && $modelWaktu->status && $modelTanah->status && $modelLahan->status_lahan && $modelProduksi->status_produksi && $modelIzin->status_izin && $modelSosial->sosial_status && $modelPekGeosains->status && $modelPekEksplorasi->status && $modelPekPengsumur->status && $modelPekPpa->status && $modelPekAccroad->status && $modelPekCod->status && $modelPekKelayakan->status && $modelPekEngineering->status && $modelPekConstruction->status && $modelPekProcurement->status && $modelPekOverallepc->status && $modelPekTransmisi->status && $modelPekPpa->status && $modelFoto->status && $modelKendala->status) {
                    $modelUnitDetail->status = "A";
                } else {
                    $modelUnitDetail->status = "R";
                };
                if ($modelPengembang->save() && $modelUnitDetail->save()) {
                    if (
                            $modelPekUjimonsumur->save() && $modelTanah->save() && $modelWaktu->save() && $modelLahan->save() && $modelIzin->save() && $modelSosial->save() && $modelPekGeosains->save() && $modelPekEksplorasi->save() && $modelPekPengsumur->save() && $modelPekAccroad->save() && $modelPekCod->save() && $modelPekKelayakan->save() && $modelPekPpa->save() && $modelPekEngineering->save() && $modelPekConstruction->save() && $modelPekProcurement->save() && $modelPekOverallepc->save() && $modelPekTransmisi->save() && $modelPekPpa->save() && $modelFoto->save() && $modelKendala->save() && $modelProduksi->save() && $modelPekKonssipil->save()
                    ) {
                        Yii::$app->session->setFlash('success', 'Data saved');
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return "data saved";
                    } else {
                        Yii::$app->session->setFlash('error', 'save ke unit detail error');
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return "save ke unit detail error";
                    };
                } else {
                    Yii::$app->session->setFlash('error', 'save ke pengembang atau unit error');
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return "save ke pengembang atau unit error";
                };
            } else {
                Yii::$app->session->setFlash('error', 'load to mode error');
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return "load to model error";
            }
        } else {
            return $this->render('_formVerifikasi', [
                        'modelUnitDetail' => $modelUnitDetail,
                        'modelUnit' => $modelUnit,
                        'pltpList' => $pltpList,
                        'wkpList' => $wkpList,
                        'unitList' => $unitList,
                        'modelWkp' => $modelWkp,
                        'modelPltp' => $modelPltp,
                        'modelPengembang' => $modelPengembang,
                        'modelTanah' => $modelTanah,
                        'modelLahan' => $modelLahan,
                        'modelProduksi' => $modelProduksi,
                        'modelIzin' => $modelIzin,
                        'modelSosial' => $modelSosial,
                        'modelPekGeosains' => $modelPekGeosains,
                        'modelPekEksplorasi' => $modelPekEksplorasi,
                        'modelPekKonssipil' => $modelPekKonssipil,
                        'modelPekPengsumur' => $modelPekPengsumur,
                        'modelPekAccroad' => $modelPekAccroad,
                        'modelPekCod' => $modelPekCod,
                        'modelPekKelayakan' => $modelPekKelayakan,
                        'modelPekConstruction' => $modelPekConstruction,
                        'modelPekOverallepc' => $modelPekOverallepc,
                        'modelPekTransmisi' => $modelPekTransmisi,
                        'modelPekUjimonsumur' => $modelPekUjimonsumur,
                        'modelPekPpa' => $modelPekPpa,
                        'modelPekEngineering' => $modelPekEngineering,
                        'modelPekProcurement' => $modelPekProcurement,
                        'modelFoto' => $modelFoto,
                        'modelWaktu' => $modelWaktu,
                        'modelKendala' => $modelKendala
            ]);
        }
    }

    /**
     * Updates an existing Unit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate() {
        $request = Yii::$app->request;
        $modelPltp = new Pltp();
        $wkpList = ArrayHelper::map($modelPltp->findWkpByUserId(Yii::$app->user->id), 'id_wkp', 'nama');
        $id_unit = $request->get('id_unit');
        $modelUnit = $this->findModel($id_unit);
        $idpltp = $modelUnit->pltp->id;
        $idwkp = $modelUnit->pltp->wkp->id_wkp;
        $idpengembang = $modelUnit->pltp->pengembang->id_pengembang;
        $nounit = $modelUnit->no_unit;
        $modelWkp = (Wkp::findOne($idwkp) !== NULL ? Wkp::findOne($idwkp) : new Wkp() );
        $modelPltp = (Pltp::findOne($idpltp) !== NULL ? Pltp::findOne($idpltp) : new Pltp() );
        $arrayUpdatedId = Unit::find()->updatedid($id_unit);

        $modelUnitDetail = (UnitDetail::findOne($arrayUpdatedId["idunitdetail"]) !== NULL ? UnitDetail::findOne($arrayUpdatedId["idunitdetail"]) : new UnitDetail() );
        $modelPengembang = (Pengembang::findOne($idpengembang) !== NULL ? Pengembang::findOne($idpengembang) : new Pengembang() );
        $modelTanah = (UnitDetailTanah::findOne($arrayUpdatedId["idtanah"]) !== NULL ? UnitDetailTanah::findOne($arrayUpdatedId["idtanah"]) : new UnitDetailTanah() );
        $modelLahan = (UnitDetailLahan::findOne($arrayUpdatedId["idlahan"]) !== NULL ? UnitDetailLahan::findOne($arrayUpdatedId["idlahan"]) : new UnitDetailLahan() );
        $modelProduksi = (UnitDetailProduksi::findOne($arrayUpdatedId["idproduksi"]) !== NULL ? UnitDetailProduksi::findOne($arrayUpdatedId["idproduksi"]) : new UnitDetailProduksi() );
        $modelProduksi->cumuap = $modelProduksi->countCumulativeUap("", "", $idpltp, $nounit);
        $modelProduksi->cumlistrik = $modelProduksi->countCumulativeListrik("", "", $idpltp, $nounit);
        $modelIzin = (UnitDetailIzin::findOne($arrayUpdatedId["idizin"]) !== NULL ? UnitDetailIzin::findOne($arrayUpdatedId["idizin"]) : new UnitDetailIzin() );
        $modelSosial = (UnitDetailSosial::findOne($arrayUpdatedId["idsosial"]) !== NULL ? UnitDetailSosial::findOne($arrayUpdatedId["idtanah"]) : new UnitDetailSosial() );
        $modelPekGeosains = (PekGeoSains::findOne($arrayUpdatedId["idgeosains"]) !== NULL ? PekGeoSains::findOne($arrayUpdatedId["idgeosains"]) : new PekGeoSains() );
        $modelPekEksplorasi = (PekEksplorasi::findOne($arrayUpdatedId["ideksplorasi"]) !== NULL ? PekEksplorasi::findOne($arrayUpdatedId["ideksplorasi"]) : new PekEksplorasi() );
        $modelPekKonssipil = (PekKonssipil::findOne($arrayUpdatedId["idsipil"]) !== NULL ? PekKonssipil::findOne($arrayUpdatedId["idsipil"]) : new PekKonssipil() );
        $modelPekPengsumur = (PekPengsumur::findOne($arrayUpdatedId["idpengsumur"]) !== NULL ? PekPengsumur::findOne($arrayUpdatedId["idpengsumur"]) : new PekPengsumur() );
        $modelPekAccroad = (PekAccroad::findOne($arrayUpdatedId["idaccroad"]) !== NULL ? PekAccroad::findOne($arrayUpdatedId["idaccroad"]) : new PekAccroad() );
        $modelPekCod = (PekCod::findOne($arrayUpdatedId["idcod"]) !== NULL ? PekCod::findOne($arrayUpdatedId["idcod"]) : new PekCod() );
        $modelPekKelayakan = (PekKelayakan::findOne($arrayUpdatedId["idkelayakan"]) !== NULL ? PekKelayakan::findOne($arrayUpdatedId["idkelayakan"]) : new PekKelayakan() );
        $modelPekEngineering = (PekEngineering::findOne($arrayUpdatedId["idengineering"]) !== NULL ? PekEngineering::findOne($arrayUpdatedId["idengineering"]) : new PekEngineering() );
        $modelPekConstruction = (PekConstruction::findOne($arrayUpdatedId["idconstruction"]) !== NULL ? PekConstruction::findOne($arrayUpdatedId["idconstruction"]) : new PekConstruction() );
        $modelPekProcurement = (PekProcurement::findOne($arrayUpdatedId["idprocurement"]) !== NULL ? PekProcurement::findOne($arrayUpdatedId["idprocurement"]) : new PekProcurement() );
        $modelPekOverallepc = (PekOverallepc::findOne($arrayUpdatedId["idoverall"]) !== NULL ? PekOverallepc::findOne($arrayUpdatedId["idoverall"]) : new PekOverallepc() );
        $modelPekTransmisi = (PekTransmisi::findOne($arrayUpdatedId["idtransmisi"]) !== NULL ? PekTransmisi::findOne($arrayUpdatedId["idtransmisi"]) : new PekTransmisi() );
        $modelPekUjimonsumur = (PekUjimonsumur::findOne($arrayUpdatedId["idsumur"]) !== NULL ? PekUjimonsumur::findOne($arrayUpdatedId["idsumur"]) : new PekUjimonsumur() );
        $modelPekPpa = (PekPpa::findOne($arrayUpdatedId["idppa"]) !== NULL ? PekPpa::findOne($arrayUpdatedId["idppa"]) : new PekPpa() );
        $modelFoto = (Foto::findOne($arrayUpdatedId["idfoto"]) !== NULL ? Foto::findOne($arrayUpdatedId["idfoto"]) : new Foto() );
        $modelWaktu = (Waktu::findOne($arrayUpdatedId["idwaktu"]) !== NULL ? Waktu::findOne($arrayUpdatedId["idwaktu"]) : new Waktu() );
        $modelKendala = (Kendala::findOne($arrayUpdatedId["idkendala"]) !== NULL ? Kendala::findOne($arrayUpdatedId["idkendala"]) : new Kendala() );
        
        $pltpList = ArrayHelper::map(Pltp::find()->all(), 'id', 'nama_pltp');
        $unitList = ArrayHelper::map(Unit::find()->selectdistinct($idpltp), 'no_unit', 'no_unit');


        if ($request->isPost) {

            $id_wkp = Yii::$app->request->post('Wkp')['id_wkp'];
            $id_pltp = Yii::$app->request->post('Unit')['id_pltp'];
            $wkp_name = Wkp::findOne($id_wkp)->nama;
            $pltp_name = Pltp::findOne($id_pltp)->nama_pltp;


            $files = array(
                array('datafile' => UploadedFile::getInstance($modelTanah, 'file'),
                    'path' => "Akta Tanah",
                    'type' => 'file',
                    'model' => $modelTanah),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'iup_file'),
                    'path' => "Izin",
                    'type' => 'iup_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'ijl_file'),
                    'path' => "Izin",
                    'type' => 'ijl_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'ippkh_file'),
                    'path' => "Izin",
                    'type' => 'ippkh_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'imb_file'),
                    'path' => "Izin",
                    'type' => 'imb_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'amdal_file'),
                    'path' => "Izin",
                    'type' => 'amdal_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'imka_file'),
                    'path' => "Izin",
                    'type' => 'imka_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelIzin, 'simaksi_file'),
                    'path' => "Izin",
                    'type' => 'simaksi_file',
                    'model' => $modelIzin),
                array('datafile' => UploadedFile::getInstance($modelPekGeosains, 'file'),
                    'path' => "Penyelidikan Geosains",
                    'type' => 'file',
                    'model' => $modelPekGeosains),
                array('datafile' => UploadedFile::getInstance($modelPekEksplorasi, 'file'),
                    'path' => "Pemboran Sumur Eksplorasi",
                    'type' => 'file',
                    'model' => $modelPekEksplorasi),
                array('datafile' => UploadedFile::getInstance($modelPekKelayakan, 'file'),
                    'path' => "Studi Kelayakan",
                    'type' => 'file',
                    'model' => $modelPekKelayakan),
                array('datafile' => UploadedFile::getInstance($modelPekPpa, 'file'),
                    'path' => "PPA",
                    'type' => 'file',
                    'model' => $modelPekPpa),
                array('datafile' => UploadedFile::getInstance($modelPekUjimonsumur, 'file'),
                    'path' => "Uji Monitoring Sumur",
                    'type' => 'file',
                    'model' => $modelPekUjimonsumur),
                array('datafile' => UploadedFile::getInstance($modelPekPengsumur, 'file'),
                    'path' => "Pengembangan Sumur Eskploitasi",
                    'type' => 'file',
                    'model' => $modelPekPengsumur),
                array('datafile' => UploadedFile::getInstance($modelPekKonssipil, 'file'),
                    'path' => "Konstruksi Sipil",
                    'type' => 'file',
                    'model' => $modelPekKonssipil),
                array('datafile' => UploadedFile::getInstance($modelPekAccroad, 'file'),
                    'path' => "Access Road",
                    'type' => 'file',
                    'model' => $modelPekAccroad),
                array('datafile' => UploadedFile::getInstance($modelPekEngineering, 'file'),
                    'path' => "Engineering",
                    'type' => 'file',
                    'model' => $modelPekEngineering),
                array('datafile' => UploadedFile::getInstance($modelPekProcurement, 'file'),
                    'path' => "Procurement",
                    'type' => 'file',
                    'model' => $modelPekProcurement),
                array('datafile' => UploadedFile::getInstance($modelPekConstruction, 'file'),
                    'path' => "Construction",
                    'type' => 'file',
                    'model' => $modelPekConstruction),
                array('datafile' => UploadedFile::getInstance($modelPekOverallepc, 'file'),
                    'path' => "Overall Progress EPC",
                    'type' => 'file',
                    'model' => $modelPekOverallepc
                ),
                array('datafile' => UploadedFile::getInstance($modelPekTransmisi, 'file'),
                    'path' => "Transmisi",
                    'type' => 'file',
                    'model' => $modelPekTransmisi),
                array('datafile' => UploadedFile::getInstance($modelPekCod, 'file'),
                    'path' => "COD",
                    'type' => 'file',
                    'model' => $modelPekCod),
            );


            if ($modelUnitDetail->load(Yii::$app->request->post()) && $modelWkp->load(Yii::$app->request->post()) && $modelPekUjimonsumur->load(Yii::$app->request->post()) && $modelPekKonssipil->load(Yii::$app->request->post()) && $modelPengembang->load(Yii::$app->request->post()) && $modelUnit->load(Yii::$app->request->post()) && $modelProduksi->load(Yii::$app->request->post()) && $modelWaktu->load(Yii::$app->request->post()) && $modelTanah->load(Yii::$app->request->post()) && $modelLahan->load(Yii::$app->request->post()) && $modelIzin->load(Yii::$app->request->post()) && $modelSosial->load(Yii::$app->request->post()) && $modelPekGeosains->load(Yii::$app->request->post()) && $modelPekEksplorasi->load(Yii::$app->request->post()) && $modelPekPengsumur->load(Yii::$app->request->post()) && $modelPekPpa->load(Yii::$app->request->post()) && $modelPekAccroad->load(Yii::$app->request->post()) && $modelPekCod->load(Yii::$app->request->post()) && $modelPekKelayakan->load(Yii::$app->request->post()) && $modelPekEngineering->load(Yii::$app->request->post()) && $modelPekConstruction->load(Yii::$app->request->post()) && $modelPekProcurement->load(Yii::$app->request->post()) && $modelPekOverallepc->load(Yii::$app->request->post()) && $modelPekTransmisi->load(Yii::$app->request->post()) && $modelPekPpa->load(Yii::$app->request->post()) && $modelKendala->load(Yii::$app->request->post())) {

                $modelUnitDetail->status = "S";
                $modelFoto->remark = Yii::$app->request->post("Foto")["remark"];
                $id_unit = $modelUnit->id_unit;
                if ($modelWkp->save() && $modelPengembang->save()) {

                    $unit_no = Unit::findOne($id_unit)->no_unit;
                    $folderstoCreate = [
                        "Izin",
                        "Akta Tanah",
                        "Penyelidikan Geosains",
                        "Pemboran Sumur Eksplorasi",
                        "Studi Kelayakan",
                        "PPA",
                        "Uji Monitoring Sumur",
                        "Pengembangan Sumur Eskploitasi",
                        "Konstruksi Sipil",
                        "Access Road",
                        "Engineering",
                        "Procurement",
                        "Construction",
                        "Overall Progress EPC",
                        "Transmisi",
                        "COD"];

                    $savePath = Yii::$app->basePath . '/../uploads/' . $wkp_name . '-' . $pltp_name . '-' . $unit_no;
                    foreach ($folderstoCreate as $foldertoCreate) {

                        if (!file_exists($savePath . '/' . $foldertoCreate)) {
                            mkdir($savePath . '/' . $foldertoCreate, 0777, true);
                        }
                    }
                    foreach ($files as $file) {
                        if (!empty($file["datafile"])) {
                            $savePath = Yii::$app->basePath . '/../uploads/' . $wkp_name . '-' . $pltp_name . '-' . $unit_no;
                            $file["datafile"]->saveAs($savePath . '/' . $file["path"] . '/' . date('Ymd') . '_' . $file["datafile"]->baseName . '.' . $file["datafile"]->extension);
                            $file["model"][$file["type"]] = date('Ymd') . '_' . $file["datafile"]->name;
                        } elseif (empty($file["datafile"]) && $file["model"]->getOldAttribute($file["type"]) !== null) {
                            $file["model"][$file["type"]] = $file["model"]->getOldAttribute($file["type"]);
                        }
                        ;
                    };

                    if (
                            $modelUnitDetail->save() && $modelFoto->save() && $modelPekUjimonsumur->save() && $modelTanah->save() && $modelWaktu->save() && $modelLahan->save() && $modelIzin->save() && $modelSosial->save() && $modelPekGeosains->save() && $modelPekEksplorasi->save() && $modelPekPengsumur->save() && $modelPekAccroad->save() && $modelPekCod->save() && $modelPekKelayakan->save() && $modelPekPpa->save() && $modelPekEngineering->save() && $modelPekConstruction->save() && $modelPekProcurement->save() && $modelPekOverallepc->save() && $modelPekTransmisi->save() && $modelPekPpa->save() && $modelKendala->save() && $modelProduksi->save() && $modelPekKonssipil->save()
                    ) {
                        Yii::$app->session->setFlash('success', 'Data saved');
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return "success";
                    } else {
                        Yii::$app->session->setFlash('error', 'saving non unit error');
                        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                        return "saving non unit error";
                    }
                } else {
                    return "saving unit error";
                }
            } else {

                return "load to model error";
            }
        } else {
            return $this->render('_formUpdate', [
                        'id_unit'=>$id_unit,
						'id_pengembang'=>$idpengembang,
						'modelUnitDetail' => $modelUnitDetail,
                        'modelUnit' => $modelUnit,
                        'pltpList' => $pltpList,
                        'wkpList' => $wkpList,
                        'unitList' => $unitList,
                        'modelWkp' => $modelWkp,
                        'modelPltp' => $modelPltp,
                        'modelUnit' => $modelUnit,
                        'modelPengembang' => $modelPengembang,
                        'modelTanah' => $modelTanah,
                        'modelLahan' => $modelLahan,
                        'modelProduksi' => $modelProduksi,
                        'modelIzin' => $modelIzin,
                        'modelSosial' => $modelSosial,
                        'modelPekGeosains' => $modelPekGeosains,
                        'modelPekEksplorasi' => $modelPekEksplorasi,
                        'modelPekKonssipil' => $modelPekKonssipil,
                        'modelPekPengsumur' => $modelPekPengsumur,
                        'modelPekAccroad' => $modelPekAccroad,
                        'modelPekCod' => $modelPekCod,
                        'modelPekKelayakan' => $modelPekKelayakan,
                        'modelPekConstruction' => $modelPekConstruction,
                        'modelPekOverallepc' => $modelPekOverallepc,
                        'modelPekTransmisi' => $modelPekTransmisi,
                        'modelPekUjimonsumur' => $modelPekUjimonsumur,
                        'modelPekPpa' => $modelPekPpa,
                        'modelPekEngineering' => $modelPekEngineering,
                        'modelPekProcurement' => $modelPekProcurement,
                        'modelFoto' => $modelFoto,
                        'modelWaktu' => $modelWaktu,
                        'modelKendala' => $modelKendala
            ]);
        }
    }

    public function actionGetpantau() {

        $request = Yii::$app->request;

        $id_wkp = $request->post('Wkp')["id_wkp"];
        $id_pltp = $request->post('Unit')["id_pltp"];
        $id_unit = $request->post('Unit')["id_unit"];
        $date = $request->post('Unit')["created_at"];
        $bulan = date("m", strtotime($date));
        $tahun = date("Y", strtotime($date));
        $modelUnit = $this->findModel($id_unit);
        $arrayId = Unit::find()->updatedidbymonthyear($id_unit, $bulan, $tahun);
        ;
        $idpengembang = $modelUnit->pltp->pengembang->id_pengembang;

        $modelWkp = (Wkp::findOne($id_wkp) !== NULL ? Wkp::findOne($id_wkp) : new Wkp() );
        $modelPltp = (Pltp::findOne($id_pltp) !== NULL ? Pltp::findOne($id_pltp) : new Pltp() );
        $modelPengembang = (Pengembang::findOne($idpengembang) !== NULL ? Pengembang::findOne($idpengembang) : new Pengembang() );
        $modelUnitDetail = (UnitDetail::findOne($arrayId["idunitdetail"]) !== NULL ? UnitDetail::findOne($arrayId["idunitdetail"]) : new UnitDetail() );
        $modelTanah = (UnitDetailTanah::findOne($arrayId["idtanah"]) !== NULL ? UnitDetailTanah::findOne($arrayId["idtanah"]) : new UnitDetailTanah() );
        $modelLahan = (UnitDetailLahan::findOne($arrayId["idlahan"]) !== NULL ? UnitDetailLahan::findOne($arrayId["idlahan"]) : new UnitDetailLahan() );
        $modelProduksi = (UnitDetailProduksi::findOne($arrayId["idproduksi"]) !== NULL ? UnitDetailProduksi::findOne($arrayId["idproduksi"]) : new UnitDetailProduksi() );
        $modelProduksi->cumuap = $modelProduksi->countCumulativeUap("", "", $id_unit);
        $modelProduksi->cumlistrik = $modelProduksi->countCumulativeListrik("", "", $id_unit);
        $modelIzin = (UnitDetailIzin::findOne($arrayId["idizin"]) !== NULL ? UnitDetailIzin::findOne($arrayId["idizin"]) : new UnitDetailIzin() );
        $modelSosial = (UnitDetailSosial::findOne($arrayId["idsosial"]) !== NULL ? UnitDetailSosial::findOne($arrayId["idtanah"]) : new UnitDetailSosial() );
        $modelPekGeosains = (PekGeoSains::findOne($arrayId["idgeosains"]) !== NULL ? PekGeoSains::findOne($arrayId["idgeosains"]) : new PekGeoSains() );
        $modelPekEksplorasi = (PekEksplorasi::findOne($arrayId["ideksplorasi"]) !== NULL ? PekEksplorasi::findOne($arrayId["ideksplorasi"]) : new PekEksplorasi() );
        $modelPekKonssipil = (PekKonssipil::findOne($arrayId["idsipil"]) !== NULL ? PekKonssipil::findOne($arrayId["idsipil"]) : new PekKonssipil() );
        $modelPekPengsumur = (PekPengsumur::findOne($arrayId["idpengsumur"]) !== NULL ? PekPengsumur::findOne($arrayId["idpengsumur"]) : new PekPengsumur() );
        $modelPekAccroad = (PekAccroad::findOne($arrayId["idaccroad"]) !== NULL ? PekAccroad::findOne($arrayId["idaccroad"]) : new PekAccroad() );
        $modelPekCod = (PekCod::findOne($arrayId["idcod"]) !== NULL ? PekCod::findOne($arrayId["idcod"]) : new PekCod() );
        $modelPekKelayakan = (PekKelayakan::findOne($arrayId["idkelayakan"]) !== NULL ? PekKelayakan::findOne($arrayId["idkelayakan"]) : new PekKelayakan() );
        $modelPekEngineering = (PekEngineering::findOne($arrayId["idengineering"]) !== NULL ? PekEngineering::findOne($arrayId["idengineering"]) : new PekEngineering() );
        $modelPekConstruction = (PekConstruction::findOne($arrayId["idconstruction"]) !== NULL ? PekConstruction::findOne($arrayId["idconstruction"]) : new PekConstruction() );
        $modelPekProcurement = (PekProcurement::findOne($arrayId["idprocurement"]) !== NULL ? PekProcurement::findOne($arrayId["idprocurement"]) : new PekProcurement() );
        $modelPekOverallepc = (PekOverallepc::findOne($arrayId["idoverall"]) !== NULL ? PekOverallepc::findOne($arrayId["idoverall"]) : new PekOverallepc() );
        $modelPekTransmisi = (PekTransmisi::findOne($arrayId["idtransmisi"]) !== NULL ? PekTransmisi::findOne($arrayId["idtransmisi"]) : new PekTransmisi() );
        $modelPekUjimonsumur = (PekUjimonsumur::findOne($arrayId["idsumur"]) !== NULL ? PekUjimonsumur::findOne($arrayId["idsumur"]) : new PekUjimonsumur() );
        $modelPekPpa = (PekPpa::findOne($arrayId["idppa"]) !== NULL ? PekPpa::findOne($arrayId["idppa"]) : new PekPpa() );
        $modelFoto = (Foto::findOne($arrayId["idfoto"]) !== NULL ? Foto::findOne($arrayId["idfoto"]) : new Foto() );
        $modelWaktu = (Waktu::findOne($arrayId["idwaktu"]) !== NULL ? Waktu::findOne($arrayId["idwaktu"]) : new Waktu() );
        $modelKendala = (Kendala::findOne($arrayId["idkendala"]) !== NULL ? Kendala::findOne($arrayId["idkendala"]) : new Kendala() );

        return $this->renderAjax('_formPantau1', [
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'modelUnitDetail' => $modelUnitDetail,
                    'modelUnit' => $modelUnit,
                    'modelWkp' => $modelWkp,
                    'modelPltp' => $modelPltp,
                    'modelUnit' => $modelUnit,
                    'modelPengembang' => $modelPengembang,
                    'modelTanah' => $modelTanah,
                    'modelLahan' => $modelLahan,
                    'modelProduksi' => $modelProduksi,
                    'modelIzin' => $modelIzin,
                    'modelSosial' => $modelSosial,
                    'modelPekGeosains' => $modelPekGeosains,
                    'modelPekEksplorasi' => $modelPekEksplorasi,
                    'modelPekKonssipil' => $modelPekKonssipil,
                    'modelPekPengsumur' => $modelPekPengsumur,
                    'modelPekAccroad' => $modelPekAccroad,
                    'modelPekCod' => $modelPekCod,
                    'modelPekKelayakan' => $modelPekKelayakan,
                    'modelPekConstruction' => $modelPekConstruction,
                    'modelPekOverallepc' => $modelPekOverallepc,
                    'modelPekTransmisi' => $modelPekTransmisi,
                    'modelPekUjimonsumur' => $modelPekUjimonsumur,
                    'modelPekPpa' => $modelPekPpa,
                    'modelPekEngineering' => $modelPekEngineering,
                    'modelPekProcurement' => $modelPekProcurement,
                    'modelFoto' => $modelFoto,
                    'modelWaktu' => $modelWaktu,
                    'modelKendala' => $modelKendala
        ]);
    }

    /**
     * Deletes an existing Unit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['admin-create-unit']);
    }

    /**
     * 
     * Export Unit information into PDF format.
     * @param string $id
     * @return mixed
     */
    public function actionPdf($id, $bulan, $tahun) {
        $modelUnit = $this->findModel($id);
        $no_unit = $modelUnit->no_unit;
        $id_unit = $id;
        $id_pltp = $modelUnit->pltp->id;
        $id_wkp = $modelUnit->pltp->wkp->id_wkp;
        $arrayId = Unit::find()->updatedidbymonthyear($id_unit, $bulan, $tahun);
        $idpengembang = $modelUnit->pltp->pengembang->id_pengembang;
        $modelWkp = (Wkp::findOne($id_wkp) !== NULL ? Wkp::findOne($id_wkp) : new Wkp() );
        $modelPltp = (Pltp::findOne($id_pltp) !== NULL ? Pltp::findOne($id_pltp) : new Pltp() );
        $modelPengembang = (Pengembang::findOne($idpengembang) !== NULL ? Pengembang::findOne($idpengembang) : new Pengembang() );
        $modelUnitDetail = (UnitDetail::findOne($arrayId["idunitdetail"]) !== NULL ? UnitDetail::findOne($arrayId["idunitdetail"]) : new UnitDetail() );
        $modelTanah = (UnitDetailTanah::findOne($arrayId["idtanah"]) !== NULL ? UnitDetailTanah::findOne($arrayId["idtanah"]) : new UnitDetailTanah() );
        $modelLahan = (UnitDetailLahan::findOne($arrayId["idlahan"]) !== NULL ? UnitDetailLahan::findOne($arrayId["idlahan"]) : new UnitDetailLahan() );
        $modelProduksi = (UnitDetailProduksi::findOne($arrayId["idproduksi"]) !== NULL ? UnitDetailProduksi::findOne($arrayId["idproduksi"]) : new UnitDetailProduksi() );
        $modelIzin = (UnitDetailIzin::findOne($arrayId["idizin"]) !== NULL ? UnitDetailIzin::findOne($arrayId["idizin"]) : new UnitDetailIzin() );
        $modelSosial = (UnitDetailSosial::findOne($arrayId["idsosial"]) !== NULL ? UnitDetailSosial::findOne($arrayId["idtanah"]) : new UnitDetailSosial() );
        $modelPekGeosains = (PekGeoSains::findOne($arrayId["idgeosains"]) !== NULL ? PekGeoSains::findOne($arrayId["idgeosains"]) : new PekGeoSains() );
        $modelPekEksplorasi = (PekEksplorasi::findOne($arrayId["ideksplorasi"]) !== NULL ? PekEksplorasi::findOne($arrayId["ideksplorasi"]) : new PekEksplorasi() );
        $modelPekKonssipil = (PekKonssipil::findOne($arrayId["idsipil"]) !== NULL ? PekKonssipil::findOne($arrayId["idsipil"]) : new PekKonssipil() );
        $modelPekPengsumur = (PekPengsumur::findOne($arrayId["idpengsumur"]) !== NULL ? PekPengsumur::findOne($arrayId["idpengsumur"]) : new PekPengsumur() );
        $modelPekAccroad = (PekAccroad::findOne($arrayId["idaccroad"]) !== NULL ? PekAccroad::findOne($arrayId["idaccroad"]) : new PekAccroad() );
        $modelPekCod = (PekCod::findOne($arrayId["idcod"]) !== NULL ? PekCod::findOne($arrayId["idcod"]) : new PekCod() );
        $modelPekKelayakan = (PekKelayakan::findOne($arrayId["idkelayakan"]) !== NULL ? PekKelayakan::findOne($arrayId["idkelayakan"]) : new PekKelayakan() );
        $modelPekEngineering = (PekEngineering::findOne($arrayId["idengineering"]) !== NULL ? PekEngineering::findOne($arrayId["idengineering"]) : new PekEngineering() );
        $modelPekConstruction = (PekConstruction::findOne($arrayId["idconstruction"]) !== NULL ? PekConstruction::findOne($arrayId["idconstruction"]) : new PekConstruction() );
        $modelPekProcurement = (PekProcurement::findOne($arrayId["idprocurement"]) !== NULL ? PekProcurement::findOne($arrayId["idprocurement"]) : new PekProcurement() );
        $modelPekOverallepc = (PekOverallepc::findOne($arrayId["idoverall"]) !== NULL ? PekOverallepc::findOne($arrayId["idoverall"]) : new PekOverallepc() );
        $modelPekTransmisi = (PekTransmisi::findOne($arrayId["idtransmisi"]) !== NULL ? PekTransmisi::findOne($arrayId["idtransmisi"]) : new PekTransmisi() );
        $modelPekUjimonsumur = (PekUjimonsumur::findOne($arrayId["idsumur"]) !== NULL ? PekUjimonsumur::findOne($arrayId["idsumur"]) : new PekUjimonsumur() );
        $modelPekPpa = (PekPpa::findOne($arrayId["idppa"]) !== NULL ? PekPpa::findOne($arrayId["idppa"]) : new PekPpa() );
        $modelFoto = (Foto::findOne($arrayId["idfoto"]) !== NULL ? Foto::findOne($arrayId["idfoto"]) : new Foto() );
        $modelWaktu = (Waktu::findOne($arrayId["idwaktu"]) !== NULL ? Waktu::findOne($arrayId["idwaktu"]) : new Waktu() );
        $modelKendala = (Kendala::findOne($arrayId["idkendala"]) !== NULL ? Kendala::findOne($arrayId["idkendala"]) : new Kendala() );
        $modelProduksi->cumuap = $modelProduksi->countCumulativeUap("", "", $id_pltp, $no_unit);
        $modelProduksi->cumlistrik = $modelProduksi->countCumulativeListrik("", "", $id_pltp, $no_unit);
        $content = $this->renderAjax('_formPantauPdf', [
            'bulan' => $bulan,
            'tahun' => $tahun,
            'modelUnitDetail' => $modelUnitDetail,
            'modelUnit' => $modelUnit,
            'modelWkp' => $modelWkp,
            'modelPltp' => $modelPltp,
            'modelUnit' => $modelUnit,
            'modelPengembang' => $modelPengembang,
            'modelTanah' => $modelTanah,
            'modelLahan' => $modelLahan,
            'modelProduksi' => $modelProduksi,
            'modelIzin' => $modelIzin,
            'modelSosial' => $modelSosial,
            'modelPekGeosains' => $modelPekGeosains,
            'modelPekEksplorasi' => $modelPekEksplorasi,
            'modelPekKonssipil' => $modelPekKonssipil,
            'modelPekPengsumur' => $modelPekPengsumur,
            'modelPekAccroad' => $modelPekAccroad,
            'modelPekCod' => $modelPekCod,
            'modelPekKelayakan' => $modelPekKelayakan,
            'modelPekConstruction' => $modelPekConstruction,
            'modelPekOverallepc' => $modelPekOverallepc,
            'modelPekTransmisi' => $modelPekTransmisi,
            'modelPekUjimonsumur' => $modelPekUjimonsumur,
            'modelPekPpa' => $modelPekPpa,
            'modelPekEngineering' => $modelPekEngineering,
            'modelPekProcurement' => $modelPekProcurement,
            'modelFoto' => $modelFoto,
            'modelWaktu' => $modelWaktu,
            'modelKendala' => $modelKendala
        ]);


        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_LANDSCAPE,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
			'marginTop'=>15,
			'marginFooter'=>1,
			'marginHeader'=>5,
            'content' => $content,
			
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.content {
                                min-height: 250px;
                                padding: 15px;
                                margin-right: auto;
                                margin-left: auto;
                                padding-left: 15px;
                                padding-right: 15px;
                                margin-top: 20px;
                            }
                            .file-preview-image{
                                width:75% !important;
                                height:75% !important;

                            }
                            .file-footer-caption{
                                display:none;
                            }
                            .file-thumbnail-footer {
                                position: relative;
                                width: 98%;
                            }
                            .file-preview-frame:not(.file-preview-error):hover {
                                box-shadow: none; 
                            }
                            .file-preview-frame {
                                position: relative;
                                display: table;
                                margin: 0px;
                                height: 100%;
                                border: 0px;
                                box-shadow: none;
                                padding: 6px;
                                float: left;
                                text-align: center;
                                vertical-align: middle;
                            }
                            .kv-field-from{
                                font-size:12px;
                            }
                            .kv-field-to{
                                font-size:12px;
                            }

                            .nopadding {
                                padding: 0 !important;
                                margin: 0 !important;
                            }
                            .kv-date-remove{
                                display:none;
                            }
                            .box-header {
                                color: #444;
                                display: block;
                                padding: 4px;
                                position: relative;
                                background: gainsboro;
                            }
                            dl{
                                margin-bottom : 0px;
                            }
                            .dl-horizontal dt {
                                /* float: left; */
                                /* width: 160px; */
                                /* overflow: hidden; */
                                /* clear: left; */
                                text-align: left; 
                                /* text-overflow: ellipsis; */
                                /* white-space: nowrap; */
                                font-weight : normal;
                            }
                            .trhead{
                                background: gainsboro;
                                vertical-align : middle;

                            }
                            th{
                                text-align:center;
                                vertical-align : middle !important;
                            }

                            .table > tbody > tr > td {

                                vertical-align: middle;
                                padding: 3px;

                            }
                            .header{
                                font-weight: bold;
                                background: gainsboro;
                                text-align: center;
                            }
                            .header-isi{
                                font-weight: bold;
                                text-align: center;
                            }


                            dl.dl-horizontal.left{
                                margin-left: 0;
                            }
                            dl.dl-horizontal.left dt{
                                text-align: left;
                                margin-bottom: 1em;
                                width: auto;
                                padding-right: 1em;
                            }
                            td.col-md-2.right{
                                text-align: center;

                            }

                            .data{
                                text-align:center;
                                vertical-align : middle;
                            }

                            .sd{
                                text-align: center;

                            }

                            .foto{
                                height : 70px;
                                vertical-align:top !important; 
                                width: 50%;
                            }
                            .form-horizontal .form-group {
                                margin-right: -15px;
                                margin-left: -15px;
                                margin-bottom: 0px;
                                margin-top: 3px;
                            }
                            .form-offset{
                                height:36px;
                            }
                            .table tbody tr td, .table tbody tr th, .table tfoot tr td, .table tfoot tr th, .table thead tr td, .table thead tr th {
                                padding: 1px !important;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #ddd;
                                font-size: 8px;
                            }
                            .box {
                               margin-bottom:0px;
                            }
                            .centered {
                                text-align:center;
                                vertical-align: middle !important;
                            }',
            'options' => ['title' => \Yii::$app->name, 'defaultheaderline'=>0,],
            'methods' => [
				
                'SetHeader' => ['<div style="text-align: left; font-weight: bold;padding-left:20px;">'
                    . '<table style="background-color:#3c8dbc;color:white;font-weight:bold;">'
                    . '<tr>'
                    . '<td rowspan="2">'
                    . Html::img('@web/image/logo.png', ['width' => 20, 'height' => 20, 'float' => 'left'])
                    . '</td>'
                    . '<td style="font-size:11px;text-align:left;vertical-align:middle;">Panas Bumi</td>'
                    . '<td style="font-size:11px;width:540px;text-align:center;vertical-align:middle;"> Format Pantau Wilayah Kerja Panas Bumi (WKP) </td>'
                    . '<td rowspan="2" style="font-size:11px;width:70px;"> Bulan '. $bulan .'</td>'
                    . '<td rowspan="2" style="font-size:11px;width:70px;"> Tahun '. $tahun . ' </td>'
                    . '</tr>'
                    . '<tr>'
                    . '<td style="font-size:11px;width:370px;text-align:left;vertical-align:middle;"> Direktorat Jenderal Energi Baru Terbarukan dan Konservasi Energi </td>'
                    . '<td style="font-size:11px;width:540px;text-align:center;vertical-align:middle;"> ' . $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '</td>'
					. '</tr>'
                    . '</table>'
                    . '</div>']
            ]
        ]);

        return $pdf->render();
    }

    public function actionViewPdf() {
        $id_unit = Yii::$app->request->get("id_unit");
        $modelUnit = $this->findModel($id_unit);
        $wkp_name = $modelUnit->pltp->wkp->nama;
        $pltp_name = $modelUnit->pltp->nama_pltp;
        $no_unit = $modelUnit->no_unit;
        $file_name = Yii::$app->request->get("file_name");
        $path = Yii::$app->basePath . '/../uploads/' . $wkp_name . '-' . $pltp_name . '-' . $no_unit;
        $file = $path . '/' . $file_name;


        if (file_exists($file)) {
            // Set up PDF headers
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $file_name . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($file));
            header('Accept-Ranges: bytes');
            // Render the file
            readfile($file);
        } else {
            return "PDF sudah tidak tersedia";
        }
    }

    public function actionLihatpdf() {
        $modelUnit = $this->findModel(1);
        $id_unit = 2;
        $id_pltp = 1;
        $id_wkp = 1;
        $arrayId = Unit::find()->updatedidbymonthyear($id_unit, 11, 2016);
        $idpengembang = 1;
        $modelWkp = (Wkp::findOne($id_wkp) !== NULL ? Wkp::findOne($id_wkp) : new Wkp() );
        $modelPltp = (Pltp::findOne($id_pltp) !== NULL ? Pltp::findOne($id_pltp) : new Pltp() );
        $modelPengembang = (Pengembang::findOne($idpengembang) !== NULL ? Pengembang::findOne($idpengembang) : new Pengembang() );
        $modelTanah = (UnitDetailTanah::findOne($arrayId["idtanah"]) !== NULL ? UnitDetailTanah::findOne($arrayId["idtanah"]) : new UnitDetailTanah() );
        $modelLahan = (UnitDetailLahan::findOne($arrayId["idlahan"]) !== NULL ? UnitDetailLahan::findOne($arrayId["idlahan"]) : new UnitDetailLahan() );
        $modelProduksi = (UnitDetailProduksi::findOne($arrayId["idproduksi"]) !== NULL ? UnitDetailProduksi::findOne($arrayId["idproduksi"]) : new UnitDetailProduksi() );
        $modelIzin = (UnitDetailIzin::findOne($arrayId["idizin"]) !== NULL ? UnitDetailIzin::findOne($arrayId["idizin"]) : new UnitDetailIzin() );
        $modelSosial = (UnitDetailSosial::findOne($arrayId["idsosial"]) !== NULL ? UnitDetailSosial::findOne($arrayId["idtanah"]) : new UnitDetailSosial() );
        $modelPekGeosains = (PekGeoSains::findOne($arrayId["idgeosains"]) !== NULL ? PekGeoSains::findOne($arrayId["idgeosains"]) : new PekGeoSains() );
        $modelPekEksplorasi = (PekEksplorasi::findOne($arrayId["ideksplorasi"]) !== NULL ? PekEksplorasi::findOne($arrayId["ideksplorasi"]) : new PekEksplorasi() );
        $modelPekKonssipil = (PekKonssipil::findOne($arrayId["idsipil"]) !== NULL ? PekKonssipil::findOne($arrayId["idsipil"]) : new PekKonssipil() );
        $modelPekPengsumur = (PekPengsumur::findOne($arrayId["idpengsumur"]) !== NULL ? PekPengsumur::findOne($arrayId["idpengsumur"]) : new PekPengsumur() );
        $modelPekAccroad = (PekAccroad::findOne($arrayId["idaccroad"]) !== NULL ? PekAccroad::findOne($arrayId["idaccroad"]) : new PekAccroad() );
        $modelPekCod = (PekCod::findOne($arrayId["idcod"]) !== NULL ? PekCod::findOne($arrayId["idcod"]) : new PekCod() );
        $modelPekKelayakan = (PekKelayakan::findOne($arrayId["idkelayakan"]) !== NULL ? PekKelayakan::findOne($arrayId["idkelayakan"]) : new PekKelayakan() );
        $modelPekEngineering = (PekEngineering::findOne($arrayId["idengineering"]) !== NULL ? PekEngineering::findOne($arrayId["idengineering"]) : new PekEngineering() );
        $modelPekConstruction = (PekConstruction::findOne($arrayId["idconstruction"]) !== NULL ? PekConstruction::findOne($arrayId["idconstruction"]) : new PekConstruction() );
        $modelPekProcurement = (PekProcurement::findOne($arrayId["idprocurement"]) !== NULL ? PekProcurement::findOne($arrayId["idprocurement"]) : new PekProcurement() );
        $modelPekOverallepc = (PekOverallepc::findOne($arrayId["idoverall"]) !== NULL ? PekOverallepc::findOne($arrayId["idoverall"]) : new PekOverallepc() );
        $modelPekTransmisi = (PekTransmisi::findOne($arrayId["idtransmisi"]) !== NULL ? PekTransmisi::findOne($arrayId["idtransmisi"]) : new PekTransmisi() );
        $modelPekUjimonsumur = (PekUjimonsumur::findOne($arrayId["idsumur"]) !== NULL ? PekUjimonsumur::findOne($arrayId["idsumur"]) : new PekUjimonsumur() );
        $modelPekPpa = (PekPpa::findOne($arrayId["idppa"]) !== NULL ? PekPpa::findOne($arrayId["idppa"]) : new PekPpa() );
        $modelFoto = (Foto::findOne($arrayId["idfoto"]) !== NULL ? Foto::findOne($arrayId["idfoto"]) : new Foto() );
        $modelWaktu = (Waktu::findOne($arrayId["idwaktu"]) !== NULL ? Waktu::findOne($arrayId["idwaktu"]) : new Waktu() );
        $modelKendala = (Kendala::findOne($arrayId["idkendala"]) !== NULL ? Kendala::findOne($arrayId["idkendala"]) : new Kendala() );

        return $this->renderAjax('_formPantauPdf', [
                    'bulan' => 11,
                    'tahun' => 2016,
                    'modelUnit' => $modelUnit,
                    'modelWkp' => $modelWkp,
                    'modelPltp' => $modelPltp,
                    'modelUnit' => $modelUnit,
                    'modelPengembang' => $modelPengembang,
                    'modelTanah' => $modelTanah,
                    'modelLahan' => $modelLahan,
                    'modelProduksi' => $modelProduksi,
                    'modelIzin' => $modelIzin,
                    'modelSosial' => $modelSosial,
                    'modelPekGeosains' => $modelPekGeosains,
                    'modelPekEksplorasi' => $modelPekEksplorasi,
                    'modelPekKonssipil' => $modelPekKonssipil,
                    'modelPekPengsumur' => $modelPekPengsumur,
                    'modelPekAccroad' => $modelPekAccroad,
                    'modelPekCod' => $modelPekCod,
                    'modelPekKelayakan' => $modelPekKelayakan,
                    'modelPekConstruction' => $modelPekConstruction,
                    'modelPekOverallepc' => $modelPekOverallepc,
                    'modelPekTransmisi' => $modelPekTransmisi,
                    'modelPekUjimonsumur' => $modelPekUjimonsumur,
                    'modelPekPpa' => $modelPekPpa,
                    'modelPekEngineering' => $modelPekEngineering,
                    'modelPekProcurement' => $modelPekProcurement,
                    'modelFoto' => $modelFoto,
                    'modelWaktu' => $modelWaktu,
                    'modelKendala' => $modelKendala
        ]);
    }

    public function actionUploadfoto() {
         $id_pltp = Yii::$app->request->post()['id_pltp'];
        $no_unit = Yii::$app->request->post()['no_unit'];
        $id_unit = Yii::$app->request->post()['id_unit'];
        $idFoto = Foto::find()->latestidthismonthyearbyunit($id_unit);
        $modelFoto = $idFoto ? Foto::findOne($idFoto) : new Foto();
        $modelFoto->id_unit = $id_unit;
        $foto1 = UploadedFile::getInstance($modelFoto, 'name');
        $foto2 = UploadedFile::getInstance($modelFoto, 'name2');
        $peta = UploadedFile::getInstance($modelFoto, 'peta');
        $id_wkp = Yii::$app->request->post()['id_wkp'];
        $wkp_name = Wkp::findOne($id_wkp)->nama;

        $pltp_name = Pltp::findOne($id_pltp)->nama_pltp;


        $savePath = Yii::$app->basePath . '/../uploads/' . $wkp_name . '-' . $pltp_name . '-' . $no_unit . '/Foto';


        if (!file_exists($savePath)) {
            mkdir($savePath, 0777, true);
        };
        if (Yii::$app->request->post()['peta'] == 1) {
            $savePath = Yii::$app->basePath . '/../uploads/' . $wkp_name . '-' . $pltp_name . '-' . $no_unit . '/Peta';
            if (!file_exists($savePath)) {
                mkdir($savePath, 0777, true);
            };
            if (!empty($peta)) {
                $peta->saveAs($savePath . '/' . date('Ymd') . '_' . $peta->baseName . '.' . strtolower($peta->extension));
                $modelFoto->peta = date('Ymd') . '_' . $peta->baseName . '.' . strtolower($peta->extension);
                $modelFoto->save();
                return json_encode("success");
            };
        }
        if (!empty($foto1)) {
            $foto1->saveAs($savePath . '/' . date('Ymd') . '_' . $foto1->baseName . '.' . strtolower($foto1->extension));
            $modelFoto->name = date('Ymd') . '_' . $foto1->baseName . '.' . strtolower($foto1->extension);
            $modelFoto->save();
            return json_encode("success");
        };
        if (!empty($foto2)) {
            $foto2->saveAs($savePath . '/' . date('Ymd') . '_' . $foto2->baseName . '.' . strtolower($foto2->extension));
            $modelFoto->name2 = date('Ymd') . '_' . $foto2->baseName . '.' . strtolower($foto2->extension);
            $modelFoto->save();
            return json_encode("success");
        };
    }

    public function actionPantau() {

        $modelWkp = new Wkp();
        $modelUnit = new Unit();

        if ($modelUnit->load(Yii::$app->request->post()) && $modelUnit->save()) {
            $modelUnit = new UnitDetail(); //reset model
        }

        $searchModel = new UnitDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $wkpList = ArrayHelper::map(Wkp::find()->all(), 'id_wkp', 'nama');
        return $this->render('indexPantau', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'modelUnit' => $modelUnit,
                    'modelWkp' => $modelWkp,
                    'wkpList' => $wkpList
        ]);
    }

    /**
     * Finds the Unit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Unit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
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
    public function actionAddFoto() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Foto');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddPekAccroad() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekAccroad');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddPekCod() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekCod');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddPekEpc() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekEpc');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddPekGeosains() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekGeosains');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddPekKelayakan() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekKelayakan');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddPekKonssipil() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekKonssipil');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddPekPengsumur() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekPengsumur');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddPekTransmisi() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PekTransmisi');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddUnitDetailDed() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailDed');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddUnitDetailIzin() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailIzin');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddUnitDetailLahan() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailLahan');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddUnitDetailSosial() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailSosial');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddUnitDetailTanah() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnitDetailTanah');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
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
    public function actionAddWaktu() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Waktu');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formWaktu', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDownload() {
        $id_unit = Yii::$app->request->get("id_unit");
        $modelUnit = $this->findModel($id_unit);
        $wkp_name = $modelUnit->pltp->wkp->nama;
        $pltp_name = $modelUnit->pltp->nama_pltp;
        $no_unit = $modelUnit->no_unit;
        $file_name = Yii::$app->request->get("file_name");
        $path = Yii::$app->basePath . '/../uploads/' . $wkp_name . '-' . $pltp_name . '-' . $no_unit;
        $file = $path . '/' . $file_name;
        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        } else {
            return false;
        }
    }

}
