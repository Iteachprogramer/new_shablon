<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\leader\models\Leadercategory */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Rahbariyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "O'zgartirish";
?>
<div class="leadercategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
