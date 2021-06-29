<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\page\models\Page */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Sahifalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="page-view">

    <p>

        <? $this->params['update']=Html::a('<span class="btn btn-success" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-pen"></i></span>',['page/update','id' => $model->id], ['style'=>'margin-right:10px']);?>
        <? $this->params['delete']=Html::a('<span class="btn btn-danger" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-trash"></i></span>',['page/delete','id' => $model->id],['data-method'=>"POST",'confirm' => 'Are you sure you want to delete this item?',],['style'=>'margin-right:10px']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute'=>'content',
                'label'=>'Izoh',
                'format'=>'html',
                'value'=>function(\backend\modules\page\models\Page $model){
                    return mb_substr(strip_tags($model->content),0,200);
                }
            ],
            //'status',
            [
                'attribute'=>'created_by',
                'label'=>"O'zgartidi",
                'format'=>'html',
                'value'=>function($model){
                    return Yii::$app->user->identity->username;
                }
            ],
            [
                'attribute'=>'updated_by',
                'label'=>"O'zgartidi",
                'format'=>'html',
                'value'=>function($model){
                    return Yii::$app->user->identity->username;
                }
            ],
            [
                'attribute'=>'status',
                'label'=>'Holati',
                'value'=>function(\backend\modules\page\models\Page $model)
                {
                    return \backend\modules\page\models\Page::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\page\models\Page::getstatus(),
            ],

        ],
    ]) ?>

</div>
