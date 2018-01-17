<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImageUpload;
use app\models\Price;
use app\models\ProductOptions;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{

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
        if (Yii::$app->user->isGuest) {
            return Yii::$app->controller->redirect(['/auth/login']);
        }

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $price = new Price();
        $productOptionsModel = new ProductOptions();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'costs' => $price->getCost($id),
            'options' => $productOptionsModel->getOptions($id)
        ]);
    }

    public function actionCreate()
    {
        $imageUpload = new ImageUpload();
        $product = new Product();
        $price = new Price();
        $productOptionsModel = new ProductOptions();
        $costs = [];
        $options = [];


        if (Yii::$app->request->isPost) {

            $post = Yii::$app->request->post();
            $productCosts = $post['Costs'];
            $productOptions = $post['options'];

            if ($product->load($post) && $product->save()) {

                if($file = UploadedFile::getInstance($imageUpload, 'image')){
                    $product->saveImage($imageUpload->uploadFile($file, $product->image));
                }

                $price->saveCost($productCosts, $product->id);
                $productOptionsModel->saveOptions($productOptions, $product->id);

                return $this->redirect(['view', 'id' => $product->id]);
            }
        }

        return $this->render('create', [
            'model' => $product,
            'imageUpload' => $imageUpload,
            'costs' => $costs,
            'options' => $options
        ]);
    }

    public function actionUpdate($id)
    {
        $imageUpload = new ImageUpload();
        $product = $this->findModel($id);
        $price = new Price();
        $productOptionsModel = new ProductOptions();
        $costs = $price->getCost($id);
        $options = $productOptionsModel->getOptions($id);

        if (Yii::$app->request->isPost) {

            $post = Yii::$app->request->post();
            $productCosts = $post['Costs'];
            $productOptions = $post['options'];
            $productId = $post['Product']['id'];

            if($file = UploadedFile::getInstance($imageUpload, 'image')){
                $product->saveImage($imageUpload->uploadFile($file, $product->image));
            }

            if ($product->load($post) 
                && $product->save() 
                && $price->saveCost($productCosts, $productId)
                && $productOptionsModel->saveOptions($productOptions, $product->id)) {
                return $this->redirect(['view', 'id' => $product->id]);
            }
        }

        return $this->render('update', [
            'model' => $product,
            'imageUpload' => $imageUpload,
            'costs' => $costs,
            'options' => $options
        ]);
    }

    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            $price = new Price();
            $price->deleteCost($id);

            return $this->redirect(['index']);
        }
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
