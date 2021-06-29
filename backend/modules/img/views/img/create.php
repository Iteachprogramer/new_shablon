<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\img\models\Img */

$this->title = "Rasim";
$this->params['breadcrumbs'][] = ['label' => 'Rasimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="img-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
