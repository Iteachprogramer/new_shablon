<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\img\models\Img */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Rasimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "O'zgartish";
?>
<div class="img-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
