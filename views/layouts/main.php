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
        background-color: #3c3c3c!important;
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
        echo Nav::widget([
            'options' => ['class' => 'navbar'],
            'items' => [
                ['label' => 'Компания', 'url' => ['/site/company']],
                ['label' => 'Металлобработка', 'url' => ['/']],
                ['label' => 'Прайс', 'url' => ['/']],
                ['label' => 'Акции', 'url' => ['/']],
                ['label' => 'Оплата', 'url' => ['/']],
                ['label' => 'Полезное', 'url' => ['/']],
                ['label' => 'Контакты', 'url' => ['/site/contact']],

                Yii::$app->user->isGuest ? (
                    ['label' => '', 'url' => ['/auth/signup']]
                ) : (''),
                Yii::$app->user->isGuest ? (
                    ['label' => '', 'url' => ['/auth/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/auth/logout'], 'post')
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->name . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
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

      <?= $content ?>
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