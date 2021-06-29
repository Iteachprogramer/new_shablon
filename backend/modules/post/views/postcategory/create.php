<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Postcategory */

$this->title = "Yangilik turi";
$this->params['breadcrumbs'][] = ['label' => 'Yangilik turi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postcategory-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
