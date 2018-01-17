<?php

namespace app\widgets;

use app\models\Category;

class MainCategories extends \yii\bootstrap\Widget
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

        $categoryItems = 
            Category::find()->where(['root' => $rootCategories, 'lvl' => '1', 'to_main' => 1])->addOrderBy('root, lft')->all();

        $level = 1;

        echo '<ul class="categories">';

        $categoryCount = 0;

        foreach ($categoryItems as $categories => $category) : $categoryCount++;?>

            <li class="categories__item">
                <a href="<?= $category->alias ?>">
                    <img src="<?= ($category->image != '') ? '/uploads/'.$category->image : 'http://placehold.it/220x150/FFF' ?>" />
                    <span><?= $category->title ?></span>
                </a>
            </li>

            <?php if ($categoryCount == 6) : ?>

            <li class="categories__item special">
                <div class="special__content">
                    <div class="special__header"><h3>Спецпредложения</h3></div>
                    <p>Сделайте заказ сегодня и получите скидку 25% на доставку (а/м FOTON)</p>
                </div>
                <button class="special__control special__control-left"></button>
                <button class="special__control special__control-right"></button>
            </li>
<?php
        endif;endforeach;
        echo '</ul>';
    }
}


