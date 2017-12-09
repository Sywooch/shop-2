<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\assets\PublicAsset;
use pceuropa\menu\Menu;
use kartik\tree\TreeViewInput;
use app\models\Category;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>

	<title>
      <?= Html::encode($this->title) ?>
    </title>

    <?php $this->head() ?>

	<style>
      .navbar-toggle .icon-bar {
		  background-color: #3c3c3c !important;
	  }

	  .navbar-fixed-top .navbar-collapse {
		  max-height: 100% !important;
	  }
    </style>
</head>

<body class="page">
  <?php $this->beginBody() ?>

  <div id="app">
    <div class="container">
      <?php
      NavBar::begin([
          'options' => [
              'class' => 'navbar navbar-fixed-top',
          ],
      ]);

      echo Nav::widget(['options' => ['class' => 'navbar'],
          'items' => Menu::NavbarLeft(1),  // argument is id of menu
      ]);
      NavBar::end();
      ?>

	  <header class="pages-header">
		<a href="/">
		  <div class="logo logo__pages-footer">ооо "кмопания"</div>
		</a>
		<div class="contacts">
		  <span class="phone">+0 000-00-00</span>
		  <a href="mailto:info@oormk.ru" class="mail">info@company.ru</a>
		</div>
	  </header>
    </div>

    <div class="container">
      <a href="/sale.html" class="banner-sale">Распродажа!</a>
    </div>

    <div class="container">
      <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>

      <?= Alert::widget() ?>
		<div class="pages-wrpaper">
			<aside class="pages-sidebar">
<!--				<ul class="sidebar">-->
<!--					<li class="sidebar__item">-->
<!--						<a href="#">Название категории товаров</a>-->
<!--						<span class="show-sidebar-list"></span>-->
<!--						<ul class="products">-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</li>-->
<!--					<li class="sidebar__item">-->
<!--						<a href="#">Название категории товаров</a>-->
<!--						<span class="show-sidebar-list"></span>-->
<!--						<ul class="products">-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</li>-->
<!--					<li class="sidebar__item">-->
<!--						<a href="#">Название категории товаров</a>-->
<!--						<span class="show-sidebar-list"></span>-->
<!--						<ul class="products">-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</li>-->
<!--					<li class="sidebar__item">-->
<!--						<a href="#">Название категории товаров</a>-->
<!--						<span class="show-sidebar-list"></span>-->
<!--						<ul class="products">-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</li>-->
<!--					<li class="sidebar__item">-->
<!--						<a href="#">Название категории товаров</a>-->
<!--						<span class="show-sidebar-list"></span>-->
<!--						<ul class="products">-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--							<li class="products__item">-->
<!--								<a href="#">Название товара</a>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</li>-->
<!--				</ul>-->

                <?php
                echo TreeViewInput::widget([
                    // single query fetch to render the tree
                    // use the Product model you have in the previous step
                    'query' => Category::find()->addOrderBy('root, lft'),
                    'headingOptions'=>['label'=>''],
                    'name' => 'kv-product', // input name
//                    'value' => '1,2,3',     // values selected (comma separated for multiple select)
                    'asDropdown' => false,   // will render the tree input widget as a dropdown.
                    'multiple' => false,     // set to false if you do not need multiple selection
                    'fontAwesome' => true,  // render font awesome icons
                    'rootOptions' => [
                        'label'=>'<i class="fa fa-tree"></i>',  // custom root label
                        'class'=>'text-success'
                    ],
                    'options'=>['disabled' => true],
                ]);?>
			</aside>
			<main class="pages-content" style="display: block;">

				<?= $content ?>

			</main>
		</div>
    </div>

    <footer class="pages-footer">
      <div class="container container__pages-footer">
        <div>
          <a href="/">
            <div class="logo">кмопания</div>
          </a>
          <p>© 2007–2017 ООО «кмопания»</p>
        </div>
        <div>
          <ul class="pages-footer__list">
            <li>
              <span class="icon-price"></span>
              <a href="/price.html">Прайс-лист</a>
            </li>
            <li>
              <span class="icon-mang"></span>
              <a href="">Кабинет менеджера</a>
            </li>
          </ul>
          <div class="pages-footer__info">
            <p>&copy; My Company
                <?= date('Y') ?>
            </p>
            <p class="adr">
              <span class="street-address">000000, г. Москва, адрес</span>
            </p>
            <p class="tel">+7 495 999-18-19</p>
            <a href="mailto:info@oormk.ru" class="email">info@company.ru</a>
          </div>
        </div>
        <div>
          <p>Мы в социальных сетях:</p>
          <a href="#" target="_blank">
            <span class="icon-vk"></span>
          </a>
          <a href="#" target="_blank">
            <span class="icon-dog"></span>
          </a>
          <a href="#" target="_blank">
            <span class="icon-fb"></span>
          </a>
          <a href="#" target="_blank">
            <span class="icon-twitter"></span>
          </a>
        </div>
      </div>
    </footer>
  </div>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>