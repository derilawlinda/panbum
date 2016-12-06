<?php

namespace backend\controllers;

use Yii;
use backend\models\Pltp;
use yii\data\ActiveDataProvider;
use backend\models\PltpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\User;
use yii\helpers\ArrayHelper;

/**
 * PltpController implements the CRUD actions for Pltp model.
 */
class PltpController extends Controller
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
     * Lists all Pltp models.
     * @return mixed
     */
    public function actionIndex()
    {
       $searchModel = new PltpSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       $model = new Pltp();
    
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $model = new Pltp(); //reset model
        }
       return $this->render('index', [
           'model'=>$model,
           'searchModel' => $searchModel, 
           'dataProvider' => $dataProvider,
       ]);
    }
    
    public function actionPenugasan()
    {
        
        $userList = ArrayHelper::map(User::find()->all(), 'id', 'username');
        
        $modelPltp = new Pltp();
        $modelUser = new User();
        return $this->render('penugasan', [
            'modelPltp'=> $modelPltp,
            'modelUser'=>$modelUser,
            'userList' => $userList,
        ]);
    }
    
    
    /**
     * Displays a single Pltp model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerUnit = new \yii\data\ArrayDataProvider([
            'allModels' => $model->units,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerUnit' => $providerUnit,
        ]);
    }

    /**
     * Creates a new Pltp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pltp();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pltp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post(), ['units']) && $model->saveAll(['units'])) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pltp model.
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
     * Finds the Pltp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pltp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pltp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Unit
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUnit()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Unit');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUnit', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
