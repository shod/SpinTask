<?php

namespace app\modules\buisness\controllers;

use Yii;
use app\models\Company;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Company::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/buisness/default/view', 'id' => $model->buisness_id]);
        }
        $model->buisness_id = Yii::$app->request->get('buisness_id');
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $services = \app\models\Service::find()->all();
        $companyService  = \app\models\CompanyService::find()->where(['company_id' => $id])->all();
        $sericeList = [];
        foreach ($companyService as $value) {
            $sericeList[$value->service_id] = 1;
        }
            
        $valuesModels = \app\models\ServicePropertyValue::find()->with('serviceProperty')->all();
        $values = [];
        foreach ($valuesModels as $value) {
            $values[$value->service_id][] = $value;
        }
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'services' => $services,
            'sericeList' => $sericeList,
            'values' => $values,
        ]);
    }
    
    public function actionService($id)
    {
        \app\models\CompanyService::deleteAll(['company_id' => $id]);
        $service  = Yii::$app->request->post('service');
        foreach ($service as $service_id => $value) {
            $model = new \app\models\CompanyService();
            $model->company_id = $id;
            $model->service_id = $service_id;
            $model->save();
        }
        
        $this->redirect(['/buisness/company/update/', 'id' => $id, '#' => 'service_details']);
    }
    
    public function actionServicevalue($id)
    {
        \app\models\CompanyServiceValue::deleteAll(['company_service_id' => $id]);
        $service  = Yii::$app->request->post('service');
        foreach ($service as $service_id => $value) {
            $model = new \app\models\CompanyService();
            $model->company_id = $id;
            $model->service_id = $service_id;
            $model->save();
        }
        
        $this->redirect(['/buisness/company/update/', 'id' => $id, '#' => 'service_details']);
    }
    

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
