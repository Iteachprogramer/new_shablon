<?php

namespace backend\modules\menumanager\controllers;

use backend\controllers\AsosController;
use yii\web\Controller;

/**
 * Default controller for the `menumanager` module
 */
class DefaultController extends AsosController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
