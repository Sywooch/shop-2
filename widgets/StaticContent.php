<?php

namespace app\widgets;

use Yii;
use yii\helpers\Html;
use yii\web\View;

class StaticContent extends \yii\bootstrap\Widget
{
    public $model;
    public $title;

    public function init()
    {
        parent::init();

        /* @var $this yii\web\View */
        /* @var $model app\models\Page */

        if (empty($this->model->title_browser)) {
            $this->title = $this->model->title;
        } else {
            $this->title = $this->model->title_browser;
        }
        if (!empty($this->model->meta_description)) {
            yii::$app->view->registerMetaTag([
                'content' => Html::encode($this->model->meta_description),
                'name' => 'description'
            ]);
        }
        if (!empty($this->model->meta_keywords)) {
            yii::$app->view->registerMetaTag([
                'content' => Html::encode($this->model->meta_keywords),
                'name' => 'keywords'
            ]);
        }
    }

    public function run()
    {
        if($this->model->alias != 'main') {
            echo ('<h2>'.$this->model->title.'</h2>');
        }
        echo ($this->model->content);
    }
}
