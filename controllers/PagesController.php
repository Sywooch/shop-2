<?php

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\Page;


class PagesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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

    public $layout ='main';

    public function actionIndex($page = 'main')
    {
        $model = $this->findModel($page);
        return $this->render($model->template, [
            'model' => $model,
        ]);
    }

    protected function findModel($alias)
    {
        $model = Page::find()->where([
            'alias' => $alias,
            'published' => Page::PUBLISHED_YES,
        ])->one();
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Страница не найдена');
    }
}
