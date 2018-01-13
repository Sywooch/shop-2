<?php

namespace app\controllers;


use yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;

class AuthController extends Controller
{
    public $layout ='auth';

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
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            $this->isAdmin() ?  $this->redirect(['/admin']) : $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->isAdmin() ?  $this->redirect(['/admin']) : $this->goBack();
        }

        return $this->render('/auth/login', [
            'model' => $model,
        ]);
    }

    public function isAdmin()
    {
        return Yii::$app->user->identity->isAdmin;
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/']);
        }
        $model = new SignupForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->signup()) {
                return $this->redirect(['/auth/login']);
            }
        }

        return $this->render('/auth/signup', ['model' => $model]);
    }
}