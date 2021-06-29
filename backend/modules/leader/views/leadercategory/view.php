<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\leader\models\Leadercategory */

$this->title ="";
$this->params['breadcrumbs'][] = ['label' => 'Rahbariyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="leadercategory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <? $this->params['update']=Html::a('<span class="btn btn-success" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-pen"></i></span>',['leadercategory/update','id' => $model->id], ['style'=>'margin-right:10px']);?>
        <? $this->params['delete']=Html::a('<span class="btn btn-danger" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-trash"></i></span>',['leadercategory/delete','id' => $model->id],['data-method'=>"POST",'confirm' => 'Are you sure you want to delete this item?',],['style'=>'margin-right:10px']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>
