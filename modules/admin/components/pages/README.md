yii2-pages
==========

Модуль реализует crud с статических страниц с использованием редактора Imperavi.

Установка
------------

Ставим расширение через композер:

```
php composer.phar require --prefer-dist bupy7/yii2-pages "*"
```

Фиксим Imperavi
------------

! После установки yii2-pages и Imperavi, необходимо в файле "Asset.php", 
расположеному в папек "vendor/vova07/impravi", на 41 строке добавить этот код: 	

```
public $js = [
    'jquery-1.12.4.min.js',
    'redactor.js'
];
```

После чего, необходимо взять файл "jquery-1.12.4.min.js" из папки web/js 
и поместить в папку "vendor/vova07/impravi/src/assets"

Так же нужно взять файл "redactor.css" из папки web/css и
поместить его в директорию vendor/vova07/impravi/src/assets, заменив оригинал.

Это устранит проблемы с высотой строк и ненужными отступами в редакторе.

Установка
------------

**Добавить модуль в ваш конфигурационный файл:**

```php
'modules' => [
    ...

    'pages' => [
        'class' => 'bupy7\pages\Module',
    ],
]
```

По умолчанию модуль использует имя таблицы '{{%страницы}}'. 
Если в базе данных эта Таблица существуют, 
изменить его добавление в конфигурацию модуля новое имя таблицы

```php
'modules' => [
    ...

    'pages' => [
        'class' => 'bupy7\pages\Module',
        'tableName' => '{{%your_table_name}}',
    ],
]
```

Usage
-----

In module two controllers: ```default``` and ```manager```.

**manager** need for control the pages out of the control panel. You need 
protect it controller via ```controllerMap``` or override it for add behavior with ```AccessControl```.

Example:

```php
'modules' => [
    ...

    'pages' => [
        ...

        'controllerMap' => [
            'manager' => [
                'class' => 'bupy7\pages\controllers\ManagerController',
                'as access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
            ],
        ],
    ],
],
```

**default** for display of pages to site. You need add url rules to
file of config for getting content via aliases pages.

Example:

```php
'urlManager' => [
    'rules' => [
        ...

        'pages/<page:[\w-]+>' => 'pages/default/index',
    ],
],
```

Вы можете загружать и добавлять файлы/изображения через Imperavi редактор, если его включить:

```php
'modules' => [
    ...
    
    'pages' => [
        ...

        'pathToImages' => '@webroot/images',
        'urlToImages' => '@web/images',
        'pathToFiles' => '@webroot/files',
        'urlToFiles' => '@web/files',
        'uploadImage' => true,
        'uploadFile' => true,
        'addImage' => true,
        'addFile' => true,
    ],
],
```

Set up the custom language at Imperavi redactor:

```php
'modules' => [
    ...

    'pages' => [
        'class' => 'bupy7\pages\Module',
        'imperaviLanguage' => 'es',
    ],
]
```

There is all list a languages here: `/vendor/vova07/yii2-imperavi-widget/src/assets/lang`.

License
-------

yii2-pages is released under the BSD 3-Clause License.
