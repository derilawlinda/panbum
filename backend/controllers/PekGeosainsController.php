<?php

namespace backend\controllers;

use Yii;
use backend\models\PekGeosains;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * PekGeosainsController implements the CRUD actions for PekGeosains model.
 */
class PekGeosainsController extends Controller
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
     * Lists all PekGeosains models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PekGeosains::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PekGeosains model.
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
     * Creates a new PekGeosains model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PekGeosains();
		$request = Yii::$app->request;
		$wkp_name = Yii::$app->request->post('PekGeosains')["wkp_name"];
		if($request->isPost){
			$savePath = Yii::$app->basePath .'/../uploads/'. $wkp_name . '/Geosains' ;
			if (!file_exists ($savePath)){
				mkdir ($savePath, 0, true);
			};
			$model->id_unit = Yii::$app->request->post("PekGeosains")["id_unit"];
			$geosainsFile = UploadedFile::getInstance($model, 'file');
			if ($model->loadAll(Yii::$app->request->post())) {
            if (!empty($geosainsFile)){
				$geosainsFile->saveAs($savePath . '/' . $geosainsFile->baseName . '.' . $geosainsFile->extension);
				$model->file = $geosainsFile->name;
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
     * Updates an existing PekGeosains model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id_geosains]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PekGeosains model.
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
     * Finds the PekGeosains model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PekGeosains the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PekGeosains::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
