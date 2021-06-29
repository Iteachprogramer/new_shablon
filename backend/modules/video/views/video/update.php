<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\video\models\Video */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Video', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "O'zgartirish";
?>
<div class="video-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
