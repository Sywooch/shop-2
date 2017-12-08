<?php
use app\widgets\StaticContent;

$this->title = 'Асгард';
?>

<style>.pages-sidebar {display: none}</style>

<div class="pages-wrpaper">
    <main class="pages-content">
        <ul class="categories">
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 1</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 2</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 3</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 4</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 5</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 6</p>
            </a>
        </li>
        <li class="categories__item special">
            <div class="special__content">
            <div class="special__header">
                <h3>Спецпредложения</h3>
            </div>
            <p>Сделайте заказ сегодня и получите скидку 25% на доставку (а/м FOTON)</p>
            </div>
            <button class="special__control special__control-left"></button>
            <button class="special__control special__control-right"></button>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 1</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 2</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 3</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 4</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 5</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 6</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 7</p>
            </a>
        </li>
        <li class="categories__item">
            <a>
            <img src="http://placehold.it/220x150/FFF" />
            <p>Категория 8</p>
            </a>
        </li>
        </ul>
    </main>
</div>

<div class="static-content">
	<?= StaticContent::widget(['model' => $model]) ?>
</div>