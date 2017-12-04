<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\ImageUpload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * UserController реализует CRUD действия для модели User
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
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

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $imageUpload = new ImageUpload();
        $user = new User();

        if (Yii::$app->request->isPost) {

            $post = Yii::$app->request->post();
            $post['User']['password'] = Yii::$app->security->generatePasswordHash($post['User']['password']);

            if ($user->load($post) && $user->save()) {

                if($file = UploadedFile::getInstance($imageUpload, 'image')){
                    $user->saveImage($imageUpload->uploadFile($file, $user->photo));
                }

                return $this->redirect(['view', 'id' => $user->id]);
            }
        }

        return $this->render('create', [
            'model' => $user,
            'imageUpload' => $imageUpload
        ]);
    }

    public function actionUpdate($id)
    {
        $imageUpload = new ImageUpload();
        $user = $this->findModel($id);

        if (Yii::$app->request->isPost) {

            $post = Yii::$app->request->post();

            if ($post['User']['password'] != $user->getPassword($id)) {
                $post['User']['password'] = Yii::$app->security->generatePasswordHash($post['User']['password']);
            }

            if($file = UploadedFile::getInstance($imageUpload, 'image')){
                $user->saveImage($imageUpload->uploadFile($file, $user->photo));
            }

            if ($user->load($post) && $user->save()) {
                return $this->redirect(['view', 'id' => $user->id]);
            }
        }

        return $this->render('update', [
            'model' => $user,
            'imageUpload' => $imageUpload,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }
}
