<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Wkp;
use backend\models\Unit;
use backend\models\UnitDetail;
use backend\models\UnitDetailSearch;
use backend\models\UnitDetailProduksi;
use yii\helpers\ArrayHelper;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','captcha'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction'
            ]
           
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $Wkp = new Wkp();
        $UnitDetail = new UnitDetail();
        $Produksi = new UnitDetailProduksi();
        $jumlahWkp = $Wkp->jumlahWkp();
        $jumlahInvestasi = $UnitDetail->jumlahInvestasi();
        $produksiUap = $Produksi->jumlahGas();
        $jumlahKapasitas = $UnitDetail->jumlahRencanaKapasitas();
        $produksiListrik = $Produksi->jumlahListrik();
        $jumlahKapTerpasang = $UnitDetail->jumlahKapTerpasang();
        $chartLabel = array();
        $monthyeardatas = $UnitDetail->getMonthAndYear()->all();
        foreach($monthyeardatas as $my)
            {
                array_push($chartLabel,array($my->bulan,$my->tahun));
            }
        $kapterpasangmonthly = $UnitDetail->jumlahKapTerpasangMonthly();
        $chartData = array();
        foreach($kapterpasangmonthly as $ktm)
            {
                array_push($chartData,$ktm->kapterpasangmonthly);
            }
        
            
            return $this->render('index', [
                    'jumlahWkp' => $jumlahWkp,
                    'jumlahInvestasi'=>$jumlahInvestasi,
                    'produksiUap'=>$produksiUap,
                    'produksiListrik'=> $produksiListrik,
                    'jumlahKapasitas'=>$jumlahKapasitas,
                    'jumlahKapTerpasang'=>$jumlahKapTerpasang,
                    'chartLabel'=>$chartLabel,
                    'chartData'=>$chartData
                        ]
        );
    }
    
     public function actionAaa() {
        $Wkp = new Wkp();
        $Unit = new Unit();
        $jumlahWkp = $Wkp->jumlahWkp();
        $jumlahInvestasi = $Unit->jumlahInvestasi();
        return $this->render('index', [
                    'jumlahWkp' => $jumlahWkp,
                    'jumlahInvestasi'=>$jumlahInvestasi
                        ]
        );
    }
    
    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionGetadmin() {
        return $this->renderPartial('/admin/user');
    }

}
