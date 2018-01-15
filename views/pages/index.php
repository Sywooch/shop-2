<?php
use app\widgets\StaticContent;
use app\widgets\MainCategories;

// var_dump($model->title_browser); die;

($model->title_browser != '') ?
    $this->title = $model->title_browser :
    $this->title = 'Асгард - металлургическая компания' ;
?>

<style>.pages-sidebar {display: none}</style>

<div class="pages-wrpaper">
    <main class="pages-content"><?= MainCategories::widget() ?></main>
</div>

<div class="static-content"><?= StaticContent::widget(['model' => $model]) ?></div>