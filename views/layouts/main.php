<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Sidebar;
use app\assets\PublicAsset;
use pceuropa\menu\Menu;

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

  <title><?= Html::encode($this->title) ?></title>

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
      <a href="/"><div class="logo logo__pages-footer">ООО "Асгард М"</div></a>
      <div class="contacts">
        <span class="phone">8 (812) 339-14-88</span>
        <a href="mailto:info@oormk.ru" class="mail">info@asgardmetall.ru</a>
      </div>
    </header>
  </div>

    <div class="container">
      <a href="dostavka.html" class="banner-sale">Доставка!</a>
    </div>

    <div class="container">
    <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>

    <div class="pages-wrpaper">
      <aside class="pages-sidebar">
        <?= Sidebar::widget() ?>
      </aside>

      <main class="pages-content" style="display: block;">
        <?= $content ?>
      </main>
    </div>
    </div>

    <footer class="pages-footer">
      <div class="pages-footer__container">
        <div>
          <a href="/">
            <div class="logo">ООО "Асгард М"</div>
          </a>
          <p>© 2007–2017 ООО "Асгард М"»</p>
        </div>
        <div>
          <ul class="pages-footer__list">
            <li>
              <span class="icon-price"></span>
              <a href="/price.html">Прайс-лист</a>
            </li>
          </ul>
          <div class="pages-footer__info">
            <p>&copy; ООО "Асгард М"
                <?= date('Y') ?>
            </p>
            <p class="adr">
              <span class="street-address">000000, г. Москва, адрес</span>
            </p>
            <p class="tel">8 (812) 339-14-88</p>
            <a href="mailto:info@oormk.ru" class="email">info@asgardmetall.ru</a>
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