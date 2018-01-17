<?php
if ($this->title = $product['title_browser'] != '') {
    $this->title = $product['title_browser']. ' - Асгард';
} else {
    $this->title = 'Асгард';
}
$this->registerMetaTag(['name' => 'description', 'content' => $product['meta_description'] ]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $product['meta_keywords'] ]);
?>

<ul class="breadcrumb">
    <li>
        <a itemprop="item" href="/" class="pathway">
            <span itemprop="name">Главная</span>
        </a>
    </li>
    <li>
        <a itemprop="item" href="/catalog/<?=$category->alias;?>.html" class="pathway">
            <span itemprop="name"><?=$category->name;?></span>
        </a>
    </li>
    <li class="active">
        <span itemprop="name"><?=$product->title?></span>
    </li>
</ul>

<article class="product">
    <h1 class="product__title"><?=$product->title?></h1>

    <section class="product-desc__wrapper">
        <img src="<?=(Yii::$app->request->hostInfo);?>/uploads/<?=$product->image?>"
             alt="<?=$product->title?>" class="product__image"/>
        <div class="product__desc"><?=$product->description?></div>
    </section>

    <aside class="product-price__wrapper">
        <div class="product__table">
            <table>
                <thead>
                    <tr><th colspan="2"><?=$product->title?></th></tr>
                </thead>
                <tbody>
                    <?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
                        <tr>
                            <td><?=$cost->size?></td>
                            <td><?=$cost->price?>₽</td>
                        </tr>
                    <?php  endif; endforeach;?>
                </tbody>
            </table>

            <button href="#" 
                    class="button button--price"
                    data-id="<?=$product->id?>"
                    data-title="<?=$product->title?>"
                    <?php $i = 0; foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
                        data-price-<?=$i++;?>="<?=$cost->price;?>"
                    <?php endif; endforeach;?>
            >Рассчитать и заказать</button>

            <div class="product__certificate">
                <img src="https://oormk.ru/images/sert.png" alt="" class="product__certificate-image" />
                <p class="product__certificate-text">Предоставляем документы по запросу на соответствующую партию товара.</p>
            </div>
        </div>
    </aside>

    <div class="delivery-banner">
        <ul class="delivery-banner__list">
            <li>
                <img src="https://oormk.ru/images/dost-tr.png" alt="Доставка до 7 тонн, 6 метров" />
                <p>
                    <a href="/delivery.html#small">До 7 тонн, 6 метров</a>
                    <br/>5000 руб.</p>
            </li>
            <li>
                <img src="https://oormk.ru/images/dost-big-tr.png" alt=" Доставка до 40 тонн, 12 метров" />
                <p>
                    <a href="/delivery.html#big">До 20 тонн, 12 метров</a>
                    <br/>10000 руб.</p>
            </li>
            <li>
                <img src="https://oormk.ru/images/dost-map.png" alt="Доставка по Москве и Московской области" />
                <p>
                    <a href="/delivery.html">Доставка по Москве и Московской области</a>
                </p>
            </li>
        </ul>
        <div class="delivery-banner__pay">
            <span>Возможна<a href="/oplata.html#place">оплата на месте</a> разгрузки!</span>
        </div>
    </div>

    <section class="product-options__wrapper">
        <div class="product__table">
            <table>
                <thead>
                    <tr><th colspan="2">Параметры</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($options as $option) : if ($option->product_id == $product->id) : ?>
                        <tr>
                            <td><?=$option->option_title?></td>
                            <td><?=$option->option_value?></td>
                        </tr>
                    <?php  endif; endforeach;?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="product__sale"><?=$product->service?></section>

    <section class="product__content"><?=$product->content?></section>

    <h2>Сопутствующая продукция</h2>
    <ul class="related-products">
        <li class="related-products__item">
            <a href="https://oormk.ru/provoloka-vyazalnaya/provoloka_1_2mm.html">
                <img src="https://oormk.ru/image/cache/data/A1/provoloka-1-2-220x150.png" alt="" />
                <span>Проволока вязальная 1,2</span>
            </a>
        </li>
        <li class="related-products__item">
            <a href="https://oormk.ru/shveller/shveller_6_5.html">
                <img src="https://oormk.ru/image/cache/data/shveller/shveller-6-5-220x150.png" alt="" />
                <span>Швеллер 6,5 У, П (12 м)</span>
            </a>
        </li>
        <li class="related-products__item">
            <a href="https://oormk.ru/setka_rabica/setka_rabica_10x1.html">
                <img src="https://oormk.ru/image/cache/data/setka_rabitsa/setka_rabitsa-10-1-220x150.png" alt="" />
                <span>Сетка рабица 10×1</span>
            </a>
        </li>
        <li class="related-products__item">
            <a href="https://oormk.ru/profil_pryamougolniy/truba_profilnaya_40x25x1_5.html">
                <img src="https://oormk.ru/image/cache/data/truba_profil_pryamoug/profil_pramoug-40-25-1-5-220x150.png" alt="" />
                <span>Труба профильная 40×25×1,5 (6 м)</span>
            </a>
        </li>
        <li class="related-products__item">
            <a href="https://oormk.ru/ugolok/ugolok_140x140x10.html">
                <img src="https://oormk.ru/image/cache/data/ugolok/ravnopol/ugolok-140-140-10-220x150.png" alt="" />
                <span>Уголок 140×140×10 (12 м)</span>
            </a>
        </li>
    </ul>

    <div class="support-banner">
        <div class="text">
            <strong>Служба поддержки поможет сделать правильный выбор и заказ</strong>
        </div>
        <div class="phone">
            <strong>+7 495 999-18-19</strong>
            <a href="#">Перезвонить мне</a>
        </div>
        <div class="clear"></div>
    </div>
</article>


