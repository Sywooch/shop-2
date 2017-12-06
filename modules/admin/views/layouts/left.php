<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel" style="position: inherit; margin: 0 0 20px 0;">
            <div class="pull-left image" style="margin-top: 3px;">
                <img src="<?=(Yii::$app->request->hostInfo); ?>/uploads/<?=Yii::$app->user->identity->photo;?>"
					  class="" alt="Аватар пользователя"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Страницы', 'icon' => 'file-text', 'url' => ['/admin']],
                    [
                        'label' => 'Категории',
                        'icon' => 'share',
                        'url' => '/admin',
                        'items' => [
                            ['label' => 'Товары', 'icon' => 'shopping-cart', 'url' => ['/admin'],],
                            ['label' => 'Услуги', 'icon' => 'wrench', 'url' => ['/admin'],],
                        ],
                    ],
                    ['label' => 'Товары', 'icon' => 'shopping-cart', 'url' => ['/admin']],
					['label' => 'Услуги', 'icon' => 'wrench', 'url' => ['/admin']],
					['label' => 'Прайс', 'icon' => 'file-text-o', 'url' => ['/admin']],
                    ['label' => 'Контакты', 'icon' => 'tty', 'url' => ['/admin']],
                    ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['/admin/user/']],
                    ['label' => 'Меню', 'icon' => 'reorder', 'url' => ['/admin/menu']],
                    ['label' => 'Настройки', 'icon' => 'gear', 'url' => ['/admin']],

//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
