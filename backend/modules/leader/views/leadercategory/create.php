<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\leader\models\Leadercategory */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Rahbariyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadercategory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
