<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\ImageUpload;
use app\models\Category;


class CategoryController extends Controller {
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->controller->redirect(['/auth/login']);
        }

        return $this->render('index');
    }

    public function actionSetImage($id)
    {
        $model = new ImageUpload();

        if (Yii::$app->request->isPost) {
            $category = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            if ($category->saveImage($model->uploadFile($file, $category->image))) {
                return $this->redirect('/admin/category');
            }
        }

        return $this->render('image', ['model'=>$model]);
    }

    public function actionDelImage($id)
    {
        $model = new ImageUpload();
        $category = $this->findModel($id);

        if ($category->deleteImage()) {
            return $this->redirect('/admin/category');
        }
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
    }
}