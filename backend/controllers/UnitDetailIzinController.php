<?php

namespace backend\controllers;

use Yii;
use backend\models\UnitDetailIzin;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UnitDetailIzinController implements the CRUD actions for UnitDetailIzin model.
 */
class UnitDetailIzinController extends Controller
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
     * Lists all UnitDetailIzin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UnitDetailIzin::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UnitDetailIzin model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UnitDetailIzin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
	 
    public function actionCreate()
    {
		
        $model = new UnitDetailIzin();
		$wkp_name = Yii::$app->request->post()["UnitDetailIzin"]["wkp_name"];
		$savePath = Yii::$app->basePath .'/../uploads/'. $wkp_name .'/Izin';
		if (!file_exists ($savePath)){
			mkdir ($savePath, 0, true);
		};
		$model->id_unit = Yii::$app->request->post()["UnitDetailIzin"]["id_unit"];
		$iupFile = UploadedFile::getInstance($model, 'iup_file');
		$ippkhFile = UploadedFile::getInstance($model, 'ippkh_file');
		$imbFile = UploadedFile::getInstance($model, 'imb_file');
		$amdalFile = UploadedFile::getInstance($model, 'amdal_file');
		$imkaFile = UploadedFile::getInstance($model, 'imka_file');
		$simaksiFile = UploadedFile::getInstance($model, 'simaksi_file');
		
		
		if ($model->loadAll(Yii::$app->request->post())) {
            if (!empty($iupFile)){
				$iupFile->saveAs($savePath . '/' . $iupFile->baseName . '.' . $iupFile->extension);
				$model->iup_file = $iupFile->name;
			};
			if (!empty($ippkhFile)){
				$ippkhFile->saveAs($savePath . '/' . $ippkhFile->baseName . '.' . $ippkhFile->extension);
				$model->ippkh_file = $ippkhFile->name;
			};
			if (!empty($amdalFile)){
				$amdalFile->saveAs($savePath . '/' . $amdalFile->baseName . '.' . $amdalFile->extension);
				$model->amdal_file = $amdalFile->name;
			};
			if (!empty($imkaFile)){
				$imkaFile->saveAs($savePath . '/' . $imkaFile->baseName . '.' . $imkaFile->extension);
				$model->imka_file = $imkaFile->name;
			};
			if (!empty($simaksiFile)){
				$simaksiFile->saveAs($savePath . '/' . $simaksiFile->baseName . '.' . $simaksiFile->extension);
				$model->simaksi_file = $simaksiFile->name;
			};
			if (!empty($imbFile)){
				$imbFile->saveAs($savePath . '/' . $imbFile->baseName . '.' . $imbFile->extension);
				$model->imb_file = $imbFile->name;
			};
			if($model->saveAll()){
				return "<div class='alert alert-success'> Data Saved </div>";
			}else{
				return "<div class='alert alert-error'> Internal Error </div>";
			}
			
			
        } else {
            return "<div class='alert alert-error'> Internal Error </div>";
        }
		
	}

    /**
     * Updates an existing UnitDetailIzin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->izin_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UnitDetailIzin model.
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
     * Finds the UnitDetailIzin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return UnitDetailIzin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UnitDetailIzin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
