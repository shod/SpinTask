<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ServiceProperty;
use yii\data\ActiveDataProvider;
use app\components\yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServicePropertyController implements the CRUD actions for ServiceProperty model.
 */
class ServicepropertyController extends Controller
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
     * Lists all ServiceProperty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ServiceProperty::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceProperty model.
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
     * Creates a new ServiceProperty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceProperty();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->type == 'bool'){
                $val = new \app\models\ServicePropertyValue();
                $val->service_property_id = $model->id;
                $val->service_id = $model->service_id;
                $val->value = '1';
                $val->save();
            }
            return $this->redirect(['/admin/serviceproperty/update', 'id' => $model->id]);
        }
        $model->service_id = Yii::$app->request->get('service_id');
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionValue()
    {
        $model = new \app\models\ServicePropertyValue();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin/serviceproperty/update', 'id' => $model->service_property_id]);
        }
         return $this->redirect(['/admin/serviceproperty/update', 'id' => $model->service_property_id]);
    }

    /**
     * Updates an existing ServiceProperty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin/service/view', 'id' => $model->service_id]);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => \app\models\ServicePropertyValue::find()->where(['service_property_id' => $model->id]),
        ]);

        return $this->render('update', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing ServiceProperty model.
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
     * Finds the ServiceProperty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceProperty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceProperty::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
