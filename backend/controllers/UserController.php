<?php

namespace backend\controllers;

use Yii;
use backend\models\base\MultipleModel as Model;
use backend\models\User;
use backend\models\UserSearch;
use backend\models\Pltp;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchPenugasanPLTP(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) 
    { 
        $model = $this->findModel($id); 
        $providerPltp = new \yii\data\ArrayDataProvider([ 
            'allModels' => $model->pltps, 
        ]); 
        $providerSocialAccount = new \yii\data\ArrayDataProvider([ 
            'allModels' => $model->socialAccounts, 
        ]); 
        $providerToken = new \yii\data\ArrayDataProvider([ 
            'allModels' => $model->tokens, 
        ]); 
        return $this->render('view', [ 
            'model' => $this->findModel($id), 
            'providerPltp' => $providerPltp, 
            'providerSocialAccount' => $providerSocialAccount, 
            'providerToken' => $providerToken, 
        ]); 
    } 
    
    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionAssignPltp($id)
    {
        $modelUser = $this->findModel($id);
        $modelsPltp = $modelUser->pltps;
        $pltpList = ArrayHelper::map(Pltp::find()->all(), 'id', 'nama_pltp');
        return $this->render('formAssignPltp', [
            'modelUser' => $modelUser,
            'modelsPltp'=>(empty($modelsPltp)) ? [new Pltp] : $modelsPltp,
            'pltpList'=>$pltpList
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

      /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {   
        $id = Yii::$app->request->post('User')['id'];
        $modelUser = $this->findModel($id);
        $modelsPltp = $modelUser->pltps;

        if ($modelUser->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPltp, 'id', 'id');
            $modelsPltp = Pltp::findAll(Yii::$app->request->post('Pltp'));
            var_dump(ArrayHelper::map($modelsPltp, 'id', 'id'));
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPltp, 'id', 'id')));

            // validate all models
            $valid = $modelUser->validate();
            $valid = Model::validateMultiple($modelsPltp) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelUser->save(false)) {
                        if (!empty($deletedIDs)) {
                            Pltp::updateAll(['id_user' => NULL],['in', 'id', $oldIDs]);
                        }
                        foreach ($modelsPltp as $modelPltp) {
                            \Yii::$app->db->createCommand('UPDATE pltp SET id_user = '.$modelUser->id.' WHERE id='.$modelPltp->id)->execute();
                            
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelUser->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for SocialAccount
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSocialAccount()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SocialAccount');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSocialAccount', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Token
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddToken()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Token');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formToken', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
