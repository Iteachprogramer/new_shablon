<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Postcategory */

$this->title = "Yangilik turi";
$this->params['breadcrumbs'][] = ['label' => "Yangilik turi", 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "O'zgartirish";
?>
<div class="postcategory-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
