<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Main extends \yii\base\Module
{
    /**
     * @inheritdoc
     */

    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout ='main';

    /**
     *
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    throw new \yii\web\NotFoundHttpException();
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {
                            if (Yii::$app->user->isGuest) {
                                return Yii::$app->controller->redirect(['/auth/login']);
                            }
                            return Yii::$app->user->identity->isAdmin;
                        }
                    ]
                ]
            ]
        ];
    }

    public function init()
    {
        parent::init();
        // custom initialization code goes here

        if (isset(Yii::$app->user->identity->isAdmin)) {
            $this->modules = [
                'menu' => [
                    'class' => 'app\modules\admin\Menu',
                ],
                'pages' => [
                    'class' => 'bupy7\pages\Module',
                    'tableName' => '{{%page}}',
                    'imperaviLanguage' => 'ru',
                    'pathToImages' => '@webroot/uploads',
                    'urlToImages' => '@web/uploads',
                    'pathToFiles' => '@webroot/uploads',
                    'urlToFiles' => '@web/uploads',
                    'uploadImage' => true,
                    'uploadFile' => true,
                    'addImage' => true,
                    'addFile' => true,
                ]
            ];
        }
    }
}
