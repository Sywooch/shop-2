<?php

namespace app\widgets;

use app\models\Category;
use app\models\Product;

class Sidebar extends \yii\bootstrap\Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $rootCategories = 
            isset((Category::find()->andWhere(['alias' => 'tovary'])->one())->root) ? 
            (Category::find()->andWhere(['alias' => 'tovary'])->one())->root : [];

        $sidebarItems = 
            Category::find()->where(['root' => $rootCategories, 'lvl' => '1'])->addOrderBy('root, lft')->all();

        $level = 1;

        echo '<ul class="sidebar">';

        foreach ($sidebarItems as $n => $category) {
            if ($category->lvl == $level) echo '</li>';
            else if ($category->lvl > $level) echo '<ul class="products">';
                else {
                    echo '<li>';
                    for ($i = $level - $category->lvl; $i; $i--) {
                        echo '</ul>';
                        echo '</li>';
                    }
                }

            echo '<li  class="sidebar__item">';
            echo '<a href="#">';
            echo $category->name;
            echo '</a><span class="show-sidebar-list"></span>';
            echo '<ul class="products">';

            $products = Product::find()->where(['category_id' => $category->id])->all();
            foreach ($products as $product) {
                echo '<li class="products__item"><a href="/product/'. $product->alias .'.html">' . $product->title . '</a></li>';
            }

            echo '</ul>';
            $level = $category->lvl;
        }

        for ($i = $level; $i; $i--) {
            echo '</li>';
            echo '</ul>';
        }

        echo '</ul>';
    }
}


