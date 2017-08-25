<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\LeaveForm;
use frontend\models\RankForm;
use frontend\models\CourseForm;

/**
 * Site controller
 */
class RequestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout', 'signup'],
        'rules' => [
        [
        'actions' => ['signup'],
        'allow' => true,
        'roles' => ['?'],
        ],
        [
        'actions' => ['logout'],
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
    public function actions()
    {
        return [
        'error' => [
        'class' => 'yii\web\ErrorAction',
        ],
        'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
        ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLeaveRequest()
    {
        $model = new LeaveForm();

        // $model->start_date = '2017-01-05 16:05';
        // $model->end_date = '2017-01-06 14:05';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // var_dump($model);die();
            if ($model->sendEmail($model)) {
                Yii::$app->session->setFlash('success', 'Your leave request has been sent. Please wait for approval.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('leave-request', [
                'model' => $model,
                ]);
        }
    }

    public function actionRankRequest()
    {
        $model = new RankForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // var_dump($model);die();
            if ($model->sendEmail($model)) {
                Yii::$app->session->setFlash('success', 'Your rank request has been sent. Please wait for approval.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('rank-request', [
                'model' => $model,
                ]);
        }
    }

    public function actionCourseRequest()
    {
        $model = new CourseForm();
        // $model->start_date = '2017-01-05 16:05';
        // $model->end_date = '2017-01-06 14:05';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // var_dump($model);die();
            if ($model->sendEmail($model)) {
                Yii::$app->session->setFlash('success', 'Your course request has been sent. Please wait for approval.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('course-request', [
                'model' => $model,
                ]);
        }
    }
}
