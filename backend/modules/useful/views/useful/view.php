<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\useful\models\Useful */

$this->title ='';
$this->params['breadcrumbs'][] = ['label' => 'Foydali saytlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="useful-view">
    <p>

        <? $this->params['update']=Html::a('<span class="btn btn-success" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-pen"></i></span>',['useful/update','id' => $model->id], ['style'=>'margin-right:10px']);?>
        <? $this->params['delete']=Html::a('<span class="btn btn-danger" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-trash"></i></span>',['useful/delete','id' => $model->id],['data-method'=>"POST",'confirm' => 'Are you sure you want to delete this item?',],['style'=>'margin-right:10px']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'img',
                'label' => 'img',
                'format' => 'html',
                'value' => function(\backend\modules\useful\models\Useful $model){
                    return Html::img($model->img,['style'=>'width:80px;height:auto']);
                }
            ],
            'url:url',
            [
                'attribute'=>'status',
                'label'=>'status',
                'value'=>function(\backend\modules\useful\models\Useful $model)
                {
                    return \backend\modules\useful\models\Useful::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\useful\models\Useful::getstatus(),
            ],
        ],
    ]) ?>

</div>
