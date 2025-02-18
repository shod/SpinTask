<?php

namespace app\controllers;

use app\helpers\SysService;
use Yii;
use app\components\yii\web\Controller; //app\components\yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Industry;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        //'actions' => ['index', 'logout'],
                        'allow' => true,
                        // 'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {		
        $industry = Industry::find()->where(['hide' => 0])->all();

        return $this->render('index', ['industry' => $industry,]);
    }

    public function actionPage($id)
    {
        $model = \app\models\Texts::findOne($id);
        $vars = ['model' => $model];
        return $this->render('page', $vars);
    }


    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }


    public function actionLogin()
    {
        $this->layout = 'main_clear_2';
        $model = new LoginForm();
        if ($model->load($_POST) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionBuisness($id = 0)
    {
        if (!$id) {
            $id = \Yii::$app->request->get('company_id');
        }
        $model = \app\models\Company::findOne($id);

        $companyService = \app\models\CompanyService::find()->where(['company_id' => $id])->all();

        if (\Yii::$app->view->title == null) {
            \Yii::$app->view->title = $model->name;

            $model_city = \app\models\City::findOne($model->city_id);
            \Yii::$app->view->title = $model->name . ' - ' . $model_city->name;

            //\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->name . ' - ' . $model_city->name,]);
        }

        return $this->render('buisness', ['model' => $model, 'companyService' => $companyService]);
    }



    public function actionQuote($id)
    {
        $company = \app\models\Company::findOne($id);
        if (!$company) {
        }

        $message = 'Request accepted. In the near future contact with you.';

        $params = $_GET['params'] ?? [];

        if (isset($_GET['phone']) && !empty($_GET['phone']) && strlen($_GET['phone']) < 15) {
            $params['phone'] = $_GET['phone'];
        }
        if (isset($_GET['email']) && !empty($_GET['email']) && strlen($_GET['email']) < 100) {
            $params['user email'] = $_GET['email'];
        }
        if (isset($_GET['comment']) && !empty($_GET['comment']) && strlen($_GET['email']) < 256) {
            $params['comment'] = $_GET['comment'];
        }
        if (isset($_GET['name']) && !empty($_GET['name']) && strlen($_GET['email']) < 50) {
            $params['name'] = $_GET['name'];
        }

        $model = new \app\models\Quote();
        $model->attributes = $_GET;
        $model->params = \yii\helpers\Json::encode($params);
        $model->company_id = $id;

        $check = \app\models\Quote::find()->where(['company_id' => $model->company_id, 'phone' => $model->phone])->count();
        if (!$check) {
            SysService::sendEmail($_GET['email'], 'You have made new request', Yii::$app->params['email_from'], false, 'simple', $params);
            SysService::sendEmail($company->email, 'New Request', Yii::$app->params['email_from'], false, 'simple-owner', $params);
            $model->save();
        }

        return $this->render('quote_result', ['model' => $model, "message" => $message]);
    }
}
