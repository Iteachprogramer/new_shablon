<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\network\models\Network */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Ijtimoiy tarmoqlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "O'zgartirish";
?>
<div class="network-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
