<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class CategoryController extends Controller {
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->controller->redirect(['/auth/login']);
        }

        return $this->render('index');
    }
}