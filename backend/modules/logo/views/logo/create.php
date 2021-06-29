<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\logo\models\Logo */

$this->title = "logo";
$this->params['breadcrumbs'][] = ['label' => 'Logo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
