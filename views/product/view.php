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

<!-- <section class="product-section">
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
</section> -->

<section class="product-section">
    <h1 class="product__title">Балка двутавровая 10 (12 м)</h1>
    <div class="product-desc__wrapper">
        <img src="https://oormk.ru/image/cache/data/balka/balka-10-555x250.png" alt="Изображение товара" class="product__image"/>
        <div class="product__desc">
            <p>Балка двутавровая 10 — популярный профиль сортового проката, который по форме напоминает букву «Н». Представленный
                вид проката высоко ценится благодаря своей прочности: двутавр в 30 раз жестче и в 7 раз прочнее стандартного профиля
                с квадратным или прямоугольным сечением, поэтому может удерживать значительный вес вне зависимости от положения
                (горизонтальное или вертикальное).</p>
            <p>Вес двутавровой балки значительно меньше квадратного или прямоугольного профиля, поэтому ее применение позволяет
                значительно снизить нагрузку на возводимую конструкцию или здание, существенно сэкономить металл и собственные
                средства.</p>
            <p>Производство двутавровой балки 10 стандартизовано, и отвечает требованиям ГОСТ 8239-89. Двутавр 10 изготавливается
                из рядовой стали (Ст. 3) или низколегированной (09Г2С), и может быть горячекатаным или сварным. Сварной двутавр
                в несколько раз легче аналогичного горячекатаного, однако горячекатаный гораздо надежнее сварного. Поэтому выбор
                того или иного профиля зависит от последующего применения двутавра.</p>
        </div>
    </div>
    <div class="product-price__wrapper">
        <div class="product__table">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Балка двутавровая 10 (12 м)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Цена за 1 метр</td>
                        <td>643₽</td>
                    </tr>
                    <tr>
                        <td>Цена от 1–10 тонн</td>
                        <td>54890₽</td>
                    </tr>
                    <tr>
                        <td>Цена от 10 тонн</td>
                        <td>53890₽</td>
                    </tr>
                </tbody>
            </table>
            <button href="" data-id="" class="button button--price">Рассчитать и заказать</button>
            <div class="product__certificate">
                <img src="https://oormk.ru/images/sert.png" alt="" class="product__certificate-image" />
                <p class="product__certificate-text">Предоставляем документы по запросу на соответствующую партию товара.</p>
            </div>
        </div>
    </div>
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
            <span>Возможна
                <a href="/oplata.html#place">оплата на месте</a> разгрузки!</span>
        </div>
    </div>
    <div class="product-options__wrapper">
        <div class="product__table">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Параметры</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Вес 1 метра</td>
                        <td>0.222кг</td>
                    </tr>
                    <tr>
                        <td>Вес 1 штуки</td>
                        <td>1.332кг</td>
                    </tr>
                    <tr>
                        <td>Длина</td>
                        <td>6м</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="product__sale">
        <h4 style="font-size: 1.5rem; color: #000">Металлообработка</h4>
        <br/>
        <p>Наша компания предлагает услуги в области металлообработки, различной сложности.</p>
        <p>Изготовление металлоконструкций.</p>
        <p>Создание высокоточных деталей с разными видами отверстий.</p>
        <p>Резка пополам - 5% от стоимости.</p>
    </div>
    <div class="product__content">
        <h3>Предназначение арматуры А500С 6</h3>
        <p>Основное предназначение данного вида проката — армирование железобетонных конструкций. Небольшое сечение и высокие
            показатели прочности сделали его универсальным материалом для упрочнения изделий при незначительном увеличении веса
            конструкции (вес 1 погонного метра арматуры А500С 6 мм — 0,222 кг). По этой причине представленный вид проката повсеместно
            применяется в следующих отраслях:</p>
        <ul>
            <li>возведение промышленных и торговых зданий;</li>
            <li>строительство монолитных домов, в том числе высотных;</li>
            <li>изготовление сеток, решеток, каркасов, в том числе сварных;</li>
            <li>усиление железобетонных изделий и металлических конструкций.</li>
        </ul>
        <h3>Особенности и преимущества</h3>
        <p>Прокат изготавливается из рядовой углеродистой стали, и в процессе изготовления подвергается термообработке (термомеханическому
            упрочнению). Такой способ получения обеспечивает высокие качественные характеристики при сравнительно низкой стоимости:
            арматура А500С 6 мм (цена за тонну) значительно дешевле аналогичных видов проката, изготовленного из низколегированной
            стали.</p>
        <p>Благодаря такому способу производства представленный металлопрокат характеризуется высокими качественными характеристиками,
            устойчивостью к коррозии, гибкостью, прочностью и отличной свариваемостью.</p>
        <p>В нашей компании вы можете купить арматуру А500С диаметром 6 мм или любой другой вид сортового проката мерной (11,7
            метров) или немерной (в бунтах) длины.</p>
        <p>Заказать данный вид проката или любой другой металлопрокат с доставкой по Москве и Московской области можно прямо
            на сайте или, позвонив по номеру телефона: +7 495 999-18-19. Доставка осуществляется в день заказа, оплата за выбранные
            позиции возможна на месте разгрузки.</p>
    </div>
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
</section>


