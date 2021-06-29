<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\leader\models\Leader */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rahbariyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="leader-view">

    <p>

        <? $this->params['update']=Html::a('<span class="btn btn-success" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-pen"></i></span>',['leader/update','id' => $model->id], ['style'=>'margin-right:10px']);?>
        <? $this->params['delete']=Html::a('<span class="btn btn-danger" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-trash"></i></span>',['leader/delete','id' => $model->id],['data-method'=>"POST",'confirm' => 'Are you sure you want to delete this item?',],['style'=>'margin-right:10px']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'phone',
            'email:email',
            'faks',
            //'published_at',
            [
                    'attribute'=>'activity',
                'label'=>'Faoliyat',
                'format'=>'html',
                'value'=>function($model){
                       return mb_substr(strip_tags($model->activity),0,200);
                }
            ],
            [
                'attribute'=>'biography',
                'label'=>'Biografiya',
                'format'=>'html',
                'value'=>function($model){
                    return mb_substr(strip_tags($model->biography),0,200);
                }
            ],
            //'category_id',
            [
                'attribute'=>'category_id',
                'label'=>'Lavozimi',
                'format'=>'html',
                'value'=>function($model){
                    return $model->category->title;
                }
            ],
            //'created_at',
            [
                    'attribute'=>'created_at',
                'label'=>'Yaratdi',
                'format'=>'html',
                'value'=>function($model){
                         return Yii::$app->user->identity->username;
                }
            ],
          //  'updated_at',
          //  'created_by',
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
                'value'=>function(\backend\modules\leader\models\Leader $model)
                {
                    return \backend\modules\leader\models\Leader::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\leader\models\Leader::getstatus(),
            ],
        ],
    ]) ?>

</div>
