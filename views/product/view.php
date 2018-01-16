<?php
if ($this->title = $product['title_browser'] != '') {
    $this->title = $product['title_browser']. ' - Асгард';
} else {
    $this->title = 'Асгард';
}
$this->registerMetaTag(['name' => 'description', 'content' => $product['meta_description'] ]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $product['meta_keywords'] ]);
?>

<!-- Хлебные крошки /-->
<ul class="breadcrumb">
    <li>
        <a itemprop="item" href="/" class="pathway">
            <span itemprop="name">Главная</span>
        </a>
    </li>
    <li >
        <a itemprop="item" href="/catalog/<?=$category->alias;?>.html" class="pathway">
            <span itemprop="name"><?=$category->name;?></span>
        </a>
    </li>
    <li class="active">
        <span itemprop="name"><?=$product->title?></span>
    </li>
</ul>
<!-- Хлебные крошки #End /-->

<section class="product">
    <h1><?=$product->title?></h1>

    <div class="product__img">
        <img class="product__image"
             src="<?=(Yii::$app->request->hostInfo);?>/uploads/<?=$product->image?>"
             alt="<?=$product->title?>"/>
    </div>

    <form class="product__price" action="">
        <span class="product__label">Объем</span>
        <select name="variant">
            <?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
            <option value=""
                data-price="<?=$cost->price?> руб"
                data-size="<?=$cost->size?>"
                data-compare-price="0 руб"><?=$cost->size?></option>
            <?php  endif; endforeach;?>
        </select>

        <span class="product__label">Цена</span>
        <?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
            <?=$cost->price;?>руб
        <?php break; endif; endforeach;?>

        <button type="submit"
                class="product__button-buy"
                data-id="<?=$product->id?>"
                data-title="<?=$product->title?>"
                <?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
                data-price="<?=$cost->price;?>"
                <?php break; endif; endforeach;?>
                data-result-text="добавлено">Купить</button>
    </form>

    <div class="info_content" itemprop="description"><?=$product->content?></div>
</section>


