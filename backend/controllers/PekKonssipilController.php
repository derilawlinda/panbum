<?php

namespace backend\controllers;

use Yii;
use backend\models\PekKonssipil;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PekKonssipilController implements the CRUD actions for PekKonssipil model.
 */
class PekKonssipilController extends Controller
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
     * Lists all PekKonssipil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PekKonssipil::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PekKonssipil model.
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
     * Creates a new PekKonssipil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PekKonssipil();

        $request = Yii::$app->request;
		$wkp_name = Yii::$app->request->post('PekKonssipil')["wkp_name"];
		if($request->isPost){
			$savePath = Yii::$app->basePath .'/../uploads/'. $wkp_name . '/Konstruksi Sipil' ;
			if (!file_exists ($savePath)){
				mkdir ($savePath, 0, true);
			};
			$model->id_unit = Yii::$app->request->post("PekKonssipil")["id_unit"];
			$file = UploadedFile::getInstance($model, 'file');
			if ($model->loadAll(Yii::$app->request->post())) {
            if (!empty($file)){
				$file->saveAs($savePath . '/'. date('Ymd') .'_'. $file->baseName . '.' . $file->extension);
				$model->file = date('Ymd').'_'.$file->name;
			};
			if($model->saveAll()){
				return "<div class='alert alert-success'> Data Saved </div>";
			}else{
				return "<div class='alert alert-error'> Internal Error </div>";
			}
			
			
        }
		
		}else{
			return $this->render('create', [
                'model' => $model,
            ]);
		
		}
    }

    /**
     * Updates an existing PekKonssipil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id_konssipil]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PekKonssipil model.
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
     * Finds the PekKonssipil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PekKonssipil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PekKonssipil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
