<?php

namespace backend\controllers;

use Yii;
use backend\models\Wkp;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WkpController implements the CRUD actions for Wkp model.
 */
class WkpController extends Controller
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
     * Lists all Wkp models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $model = new Wkp();
        $wkpSearchModel = new \backend\models\WkpSearch();
        $dataProvider =  $wkpSearchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $model = new Wkp(); //reset model
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=>$model,
            'wkpSearchModel'=> $wkpSearchModel
        ]);
    }

    /**
     * Displays a single Wkp model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerPltp = new \yii\data\ArrayDataProvider([
            'allModels' => $model->pltps,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerPltp' => $providerPltp,
        ]);
    }

    /**
     * Creates a new Wkp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Wkp();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id_wkp]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Wkp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post(),['pltps']) && $model->saveAll(['pltps'])) {
            return $this->redirect(['view', 'id' => $model->id_wkp]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Wkp model.
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
     * Finds the Wkp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Wkp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wkp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Pltp
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPltp()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Pltp');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPltp', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
