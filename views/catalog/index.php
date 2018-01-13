<?php

use app\widgets\StaticContent;
use yii\widgets\LinkPager;

if ($this->title = $model['title_browser'] != '') {
    $this->title = $model['title_browser']. ' | Магазин химических реактивов';
} else {
    $this->title = 'Магазин химических реактивов';
}
$this->registerMetaTag(['name' => 'description', 'content' => $model['meta_description'] ]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $model['meta_keywords'] ]);

?>

<div id="center">
    <div class="container">
        <div class="row">
			<aside class="left_side col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <div class="left_news">
                    <!-- Меню блога -->
					<div class="border_title">
						<span>Новое в блоге</span>
						<a class="see_all" href="<?=(Yii::$app->request->hostInfo); ?>/blog.html">Все статьи</a>
					</div>
					<ul>
						<li>
							<a href="<?=(Yii::$app->request->hostInfo); ?>/blog/kak-poluchit-fosfornuyu-kislotu.html">Как получить фосфорную кислоту?</a>
							<span class="news_date">28.08.2017</span>
						</li>
						<li>
							<a href="<?=(Yii::$app->request->hostInfo); ?>/blog/svojstva-poluchenie-hranenie-i-primenenie-valerofenona.html">Свойства, получение, хранение и применение валерофенона</a>
							<span class="news_date">06.06.2017</span>
						</li>
						<li>
							<a href="<?=(Yii::$app->request->hostInfo); ?>/blog/sposoby-opredeleniya-fenolov-v-obektah-okruzhayuschej-sredy.html">Способы определения фенолов в объектах окружающей среды</a>
							<span class="news_date">14.02.2017</span>
						</li>
						<li>
							<a href="<?=(Yii::$app->request->hostInfo); ?>/blog/metody-vydeleniya-i-analiza-efirnyh-masel.html">Методы выделения и анализа эфирных масел</a>
							<span class="news_date">13.10.2016</span>
						</li>
						<li>
							<a href="<?=(Yii::$app->request->hostInfo); ?>/blog/klassifikatsiya-sposobov-polucheniya-ultradispersnyh-oksidnyh-poroshkov.html">Классификация способов получения ультрадисперсных оксидных порошков</a>
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
						<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="path breadcrumb  ico breadcrumbs grey">
							<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
								<a itemprop="item" href="<?=(Yii::$app->request->hostInfo); ?>" class="pathway">
									<span itemprop="name">Магазин химических реактивов</span>
								</a>
								<meta itemprop="position" content="1">
							</li>
							<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
								<span itemprop="name">Каталог</span>
								<meta itemprop="position" content="2">
							</li>
						</ol>
					</div>
				</div>
				<!-- Хлебные крошки #End /-->

				<div class="inner_catalog">
					<div class="price-list">
<!--						<a href="/price.xlsx" title="Скачать прайс">Скачать прайс</a>-->
					</div>
					<h2>Каталог</h2>

					<!--Каталог товаров-->
					<div class="top_pag">
						<div class="pagination">
							<?php echo LinkPager::widget([
								'pagination' => $pagination,
							]); ?>
						</div>
					</div>

					<!-- Список товаров-->
					<div class="catalog_each_product_list">
						<?php foreach ($products as $product) : ?>
							<div class="each_product catalog_each_product">
								<div class="each_product_img">
									<div class="product_img">
										<a title="<?=$product->title?>" href="/product/<?=$product->alias?>.html">
											<img src="<?=(Yii::$app->request->hostInfo);?>/uploads/<?=$product->image?>"
												 alt="<?=$product->alias?>"/>
										</a>
									</div>
								</div>
								<div class="each_product_block">
									<div class="each_product_content">
										<div class="product_title">
											<a title="<?=$product->title?>" data-product="222"
											   href="/product/<?=$product->alias?>.html"><?=$product->title?>
											</a>
										</div>
										<div class="product_rating" id="ratig-layer-222">
											<!-- Рейтинг товара -->
											<?php for ($i = 0; $i < intval($product->rating); $i++) :?>
												<div class="star_active" datafld="1" datasrc="222"></div>
											<?php endfor;
											 for ($b = $i; $b < 5; $b++) :?>
												<div class="star" datafld="1" datasrc="222"></div>
											<?php endfor;?>
											<!-- Рейтинг товара (The End) -->
										</div>
										<div class="annotation"> <?=$product->annotation?></div>
									</div>
									<div class="each_product_info">
										<div class="product_prices">
											<form class="addProductToCart" action="">
												<div class="prc_select">
													<?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
														<span class="prc-new"><?=$cost->price?></span>
													<?php  break; endif; endforeach;?>
													<select name="variant">
														<?php foreach ($costs as $cost) : if ($cost->product_id == $product->id) : ?>
															<option value=""
																	data-price="<?=$cost->price?> руб"
																	data-size="<?=$cost->size?>"
																	data-compare-price="0 руб"><?=$cost->size?></option>
														<?php  endif; endforeach;?>
													</select>
												</div>
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
									</div>
								</div>
							</div>
						<?php endforeach;?>
					</div>

					<!-- Листалка страниц -->
					<div class="pagination">
						<?php
							echo LinkPager::widget([
								'pagination' => $pagination,
							]);
						?>
					</div>
				</div>
			</section>
        </div>

		<div class="static-content">
			<?= StaticContent::widget(['model' => $model]) ?>
		</div>
    </div>
</div>

<div id="share_line">
	<div class="container share_line">
		<div class="share_title"><span class="b">Свяжитесь с нами</span></div>
		<div class="share_block" id="yasha"></div>
	</div>
</div>