<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\logo\models\Logo */

$this->title = 'Logo';
$this->params['breadcrumbs'][] = ['label' => 'Logo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "O'zgartirish";
?>
<div class="logo-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
