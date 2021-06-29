<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model backend\modules\leader\models\Leader */
$this->title = "rahbariyat";
$this->params['breadcrumbs'][] = ['label' => 'Rahbariyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leader-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
