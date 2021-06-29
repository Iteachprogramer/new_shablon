<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\Setting */

$this->title ='';
$this->params['breadcrumbs'][] = ['label' => 'Sozlamalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-view">
    <p>
        <? $this->params['update']=Html::a('<span class="btn btn-success" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-pen"></i></span>',['setting/update','id' => $model->id], ['style'=>'margin-right:10px']);?>
        <? $this->params['delete']=Html::a('<span class="btn btn-danger" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-trash"></i></span>',['setting/delete','id' => $model->id],['data-method'=>"POST",'confirm' => 'Are you sure you want to delete this item?',],['style'=>'margin-right:10px']);?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'address',
            'phone',
            'email:email',
            'faks',
            'status',
        ],
    ]) ?>

</div>
