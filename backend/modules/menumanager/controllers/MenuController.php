<?php


namespace backend\modules\menumanager\controllers;

use backend\controllers\AsosController;
use backend\controllers\BackendController;
use backend\modules\leader\models\Leadercategory;
use backend\modules\page\models\Page;
use backend\modules\post\models\Postcategory;
use Yii;
use yii\helpers\Html;

use yii\web\Controller;

class MenuController extends AsosController
{

    public function actionGetValue()
    {

        $options = '';
        $type = $_GET['type'];
        if ($type == 'category') {
            $options = $this->categories();
        }
        if ($type == 'leader') {
            $options = $this->leaders();
        }
        if ($type == 'page') {
            $options = $this->pages();
        }


        if ($type == 'c-action') {
            $options = $this->sections();
        }

        return Html::tag('select', $options, [
            'id' => 'tree-url_value',
            'class' => 'form-control',
            'name' => 'Menu[url_value]'
        ]);

    }

    private function categories()
    {

        $categories = Postcategory::find()->all();
        $options = Html::tag('option', "Kategoriyani tanlang");
        foreach ($categories as $category) {
            $options .= Html::tag('option', $category->title_uz, ['value' => $category->slug]);
        }

        return $options;
    }
    private function leaders()
    {

        $categories = Leadercategory::find()->all();
        $options = Html::tag('option', "Kategoriyani tanlang");
        foreach ($categories as $category) {
            $options .= Html::tag('option', $category->title_uz, ['value' => $category->slug]);
        }
        return $options;
    }
    private function pages()
    {
        $pages = Page::find()->all();
        $options = Html::tag('option', "Sahifani tanlang");
        foreach ($pages as $page) {
            $options .= Html::tag('option', $page->slug, ['value' => $page->slug]);
        }
        return $options;
    }

    private function sections()
    {
        $sections = Yii::$app->getModule('menumanager')->sections();
        $options = Html::tag('option', "Sahifani tanlang ... ");
        foreach ($sections as $route => $label) {
            $options .= Html::tag('option', $label, ['value' => $route]);
        }
        return $options;
    }

}