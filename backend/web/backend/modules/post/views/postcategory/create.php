<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Postcategory */

$this->title = 'Create Postcategory';
$this->params['breadcrumbs'][] = ['label' => 'Postcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
