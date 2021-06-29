<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\page\models\Page */

$this->title = "Sahifa";
$this->params['breadcrumbs'][] = ['label' => 'Sahifalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
