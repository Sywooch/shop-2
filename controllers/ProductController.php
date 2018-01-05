<?php

namespace app\controllers;

use app\models\Product;
use app\models\Price;
use app\models\Category;
use yii\web\NotFoundHttpException;

class ProductController extends \yii\web\Controller
{
    public $layout ='main';

    public function actionIndex()
    {
        return $this->redirect('/catalog');
    }

    public function actionView($alias)
    {
        if ($alias != null) {
            $item = $this->getProductByAlias($alias);

            return $this->render('view', [
                'product' => $item['product'],
                'costs' => $item['costs'],
                'category' => $item['category']
            ]);
        } else {
            throw new NotFoundHttpException('Недопустимое значение.');
        }
    }

    public function getProductByAlias($alias)
    {
        if (($item['product']  = Product::find()->where(['alias' => $alias])->one()) !== null) {
            $item['costs'] = Price::find()->where(['product_id' => $item['product']['id']])->all();
            $item['category'] = Category::find()->where(['id' => $item['product']['category_id']])->one();
            return $item;
        } else {
            throw new NotFoundHttpException('Товар не найден.');
        }
    }
}
