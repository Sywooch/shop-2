<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use app\models\Page;
use app\models\Price;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CatalogController extends \yii\web\Controller
{
    public $layout = 'main';

    public function actionIndex()
    {
        $model = $this->getPageModel();

        // build a DB query to get all articles with status = 1
        $query = Product::find();

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 8,
        ]);

        // limit the query using the pagination and retrieve the articles
        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $costs = Price::find()->all();

        return $this->render('index', [
            'model' => $model,
            'products' => $products,
            'pagination' => $pagination,
            'costs' => $costs
        ]);
    }

    public function actionView($alias)
    {
        $category = $this->getCategory($alias);

        $model = $this->getPageModel();

        // build a DB query to get all articles with status = 1
        $query = Product::find()->where(['category_id' => $category->id]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 8,
        ]);

        // limit the query using the pagination and retrieve the articles
        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $costs = Price::find()->all();

        return $this->render('index', [
            'model' => $model,
            'products' => $products,
            'pagination' => $pagination,
            'costs' => $costs
        ]);
    }

    public function getCategory($alias)
    {
        return Category::find()->where([
            'alias' => $alias
        ])->one();
    }

    public function getPageModel()
    {
        return Page::find()->where([
            'alias' => 'catalog',
            'published' => Page::PUBLISHED_YES,
        ])->one();

    }
}