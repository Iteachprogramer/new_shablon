<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\useful\models\Useful */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Foydali saytlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "O'zgartirish";
?>
<div class="useful-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
