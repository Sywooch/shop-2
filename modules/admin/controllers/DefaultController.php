<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (!isset(Yii::$app->user->identity->isAdmin)) {
            return Yii::$app->controller->redirect(['/auth/login']);
        }
        return $this->render('index');
    }
}
