<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;

class CategoryController extends Controller {
    public function actionIndex()
    {
        return $this->render('index');
    }
}