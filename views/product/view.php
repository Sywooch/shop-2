<?php
if ($this->title = $product['title_browser'] != '') {
    $this->title = $product['title_browser']. ' | Магазин химических реактивов';
} else {
    $this->title = 'Магазин химических реактивов';
}
$this->registerMetaTag(['name' => 'description', 'content' => $product['meta_description'] ]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $product['meta_keywords'] ]);
?>

<style>
    .autocomplete-suggestions{
        background-color: #ffffff;
        overflow: hidden;
        border: 1px solid #e0e0e0;
        overflow-y: auto;
    }
    .autocomplete-suggestions .autocomplete-suggestion{cursor: default;}
    .autocomplete-suggestions .selected { background:#F0F0F0; }
    .autocomplete-suggestions div { padding:2px 5px; white-space:nowrap; }
    .autocomplete-suggestions strong { font-weight:normal; color:#3399FF; }
</style>

<div id="center">
    <div class="container">
        <div class="row">
			<aside class="left_side col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <div class="left_news">
                    <!-- Меню блога -->
					<div class="border_title">
						<span>Новое в блоге</span>
						<a class="see_all" href="../blog.html">Все статьи</a>
					</div>
					<ul>
						<li>
							<a href="../blog/kak-poluchit-fosfornuyu-kislotu.html">Как получить фосфорную кислоту?</a>
							<span class="news_date">28.08.2017</span>
						</li>
						<li>
							<a href="../blog/svojstva-poluchenie-hranenie-i-primenenie-valerofenona.html">Свойства, получение, хранение и применение валерофенона</a>
							<span class="news_date">06.06.2017</span>
						</li>
						<li>
							<a href="../blog/sposoby-opredeleniya-fenolov-v-obektah-okruzhayuschej-sredy.html">Способы определения фенолов в объектах окружающей среды</a>
							<span class="news_date">14.02.2017</span>
						</li>
						<li>
							<a href="../blog/metody-vydeleniya-i-analiza-efirnyh-masel.html">Методы выделения и анализа эфирных масел</a>
							<span class="news_date">13.10.2016</span>
						</li>
						<li>
							<a href="../blog/klassifikatsiya-sposobov-polucheniya-ultradispersnyh-oksidnyh-poroshkov.html">Классификация способов получения ультрадисперсных оксидных порошков</a>
							<span class="news_date">13.10.2016</span>
						</li>
					</ul>
				</div>

				<!-- Новые комментарии -->
                <div class="left_news">
                    <div class="border_title">
                        <span>Последние отзывы</span>
                    </div>
                    <div class="responses">
						<div class="each_response">
							<div class="response_desc">
								<a href="<?=(Yii::$app->request->hostInfo); ?>/product/14-butandiol-99.html"
								   title="1,4 бутандиол 99%">1,4 бутандиол 99%</a>
							 		Брал в этом магазине бутандиол, реактив качественный, без посторонних запахов,
									производство Европа! Ценник шикарный. Так держать! теперь буру только тутите！
							</div>
							<div class="response_info">
								<span class="user_name">Алексей</span>
								<span class="user_date">21.11.2017</span>
							</div>
						</div>
						<div class="each_response">
							<div class="response_desc">
								<a href="<?=(Yii::$app->request->hostInfo); ?>/product/brom.html"
								   title="Бром">Бром</a>
									Спасибо за скидку, парни!
									Купил один литр брома всего за 10 тысяч рублей.
									Сейчас бром в Москве  нигде не достанешь, нашел его только у Вас.
							</div>
							<div class="response_info">
								<span class="user_name">Игорь</span>
								<span class="user_date">04.11.2017</span>
							</div>
						</div>
						<div class="each_response">
							<div class="response_desc">
								<a href="<?=(Yii::$app->request->hostInfo); ?>/product/bromketon-4-r-r-v-dhm-9.html"
								   title="Бромкетон 4 р-р в ДХМ 9%">Бромкетон 4 р-р в ДХМ 9%</a>
									Качество на 4, а цена просто сказка! Очень выгодно получаетс
							</div>
							<div class="response_info">
								<span class="user_name">Денис</span>
								<span class="user_date">26.09.2017</span>
							</div>
						</div>
					</div>
                </div>
				<!-- Новые комментарии (The End) -->
			</aside>
			<section class="main_side col-lg-9 col-md-8 col-sm-8 col-xs-12">
				<!-- Хлебные крошки /-->
				<div id="breadcrumbs">
					<div class="wrp">
						<ul itemscope itemtype="http://schema.org/BreadcrumbList" class="path breadcrumb  ico breadcrumbs grey">
							<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
								<a itemprop="item" href="/" class="pathway">
									<span itemprop="name">Магазин химических реактивов</span>
								</a>
								<meta itemprop="position" content="1">
							</li>
							<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
								<a itemprop="item" href="/catalog/<?=$category->alias;?>.html" class="pathway">
									<span itemprop="name"><?=$category->name;?></span>
								</a>
								<meta itemprop="position" content="2">
							</li>
							<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
								<span itemprop="name">Фенилнитропропан</span>
								<meta itemprop="position" content="3">
							</li>
						</ul>
					</div>
				</div>
				<!-- Хлебные крошки #End /-->

				<div itemscope itemtype="http://schema.org/Product">
					<div class="inner_product">
						<div class="info_stars">
							<div class="product_rating" id="ratig-layer-207">
								<!-- Рейтинг товара -->
								<!-- Рейтинг товара -->
                                <?php for ($i = 0; $i < intval($product->rating); $i++) :?>
									<div class="star_active" datafld="1" datasrc="222"></div>
                                <?php endfor;
                                for ($b = $i; $b < 5; $b++) :?>
									<div class="star" datafld="1" datasrc="222"></div>
                                <?php endfor;?>
								<!-- Рейтинг товара (The End) -->
							</div>
						</div>

						<h1 itemprop="name" data-product="207"><?=$product->title?></h1>
						<div class="row">
							<!-- Большое фото -->
							<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
								<div class="product_big_img">
									<div class="product_img">
										<a title="<?=$product->title?>" class="zoom" rel="group" target="_blank"
										   href="<?=(Yii::$app->request->hostInfo);?>/uploads/<?=$product->image?>">
											<img itemprop="image"
												 src="<?=(Yii::$app->request->hostInfo);?>/uploads/<?=$product->image?>"
												 alt="<?=$product->title?>"/>
										</a>
									</div>
								</div>
								<!-- Большое фото (The End)-->
							</div>
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
								<div class="inner_product_main">
									<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
										<div class="product_prices">
											<form class="variants" action="http://chemprom.com/cart">
												<div class="prc_select">
													<span class="product_label">Объем</span>
													<select name="variant">
														<?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
															<option value=""
																	data-price="<?=$cost->price?> руб"
																	data-size="<?=$cost->size?>"
																	data-compare-price="0 руб"><?=$cost->size?></option>
														<?php  endif; endforeach;?>
													</select>
												</div><br>
												<span class="product_label">Цена</span>
												<span class="prc-new">
												<?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
													<span itemprop="price"><?=$cost->price;?></span> руб</span>
												<?php break; endif; endforeach;?>

												<button type="submit"
														class="btn_blue add_item"
														data-id="<?=$product->id?>"
														data-title="<?=$product->title?>"
														<?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
														data-price="<?=$cost->price;?>"
														<?php break; endif; endforeach;?>
														data-result-text="добавлено">Купить</button>
											</form>
										</div>
										<meta itemprop="priceCurrency" content="RUB" />
									</span>

									<div class="prod_features">
										<div class="pr_feature qwoliti">Высокое качество</div>
										<div class="pr_feature paymnt">Удобные варианты оплаты</div>
										<div class="pr_feature dlvry">Различные варианты доставки</div>
									</div>

									<div class="payment">
										<div class="payment_title">Способы оплаты</div>
										<ul class="payments">
											<li><span class="payment_ya icon">Яндекс.Деньги</span></li>
											<li><span class="payment_wm icon">WebMoney</span></li>
											<li><span class="payment_qiwi icon">Qiwi</span></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="inner_product_info">
									<div class="info_content" itemprop="description">
										<?=$product->content?>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div id="share_line">
						<div class="share_line">
							<div class="share_title"></div>
							<div class="share_block" id="yasha"></div>
						</div>
					</div>
				</div>

				<script type="text/javascript" src="../js/fancybox/jquery.fancybox.pack.js"></script>
				<link rel="stylesheet" href="../js/fancybox/jquery.fancybox.css" type="text/css" media="screen"/>
				<script>
					$(function () {
					  // Зум картинок
					  $("a.zoom").fancybox({
						prevEffect: 'fade',
						nextEffect: 'fade'
					  });
					});
				</script>
			</section>
        </div>
    </div>
</div>

