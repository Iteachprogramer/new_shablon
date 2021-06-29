<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Post */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Yangiliklar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">
    <p>
        <? $this->params['update']=Html::a('<span class="btn btn-success" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-pen"></i></span>',['post/update','id' => $model->id], ['style'=>'margin-right:10px']);?>
        <? $this->params['delete']=Html::a('<span class="btn btn-danger" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-trash"></i></span>',['post/delete','id' => $model->id],['data-method'=>"POST",'confirm' => 'Are you sure you want to delete this item?',],['style'=>'margin-right:10px']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'published_at:date',
            [
                'attribute' => 'category_id',
                'label' => 'Yangilik turi',
                'format' => 'html',
                'value' => function($model){
                    return $model->category->title;
                }
            ],
            [
                'attribute'=>'content',
                'label'=>'content',
                'format'=>'html',
//                'value'=>function($model){
//                    return mb_substr(strip_tags($model->content),0,200);
//                }
            ],
            //'created_at',
            //'updated_at',
            [
                'attribute'=>'created_by',
                'label'=>'Yaratdi',
                'format'=>'html',
                'value'=>function($model){
                    return Yii::$app->user->identity->username;
                }
            ],
            [
                'attribute'=>'updated_by',
                'label'=>"O'zgartirdi",
                'format'=>'html',
                'value'=>function($model){
                    return Yii::$app->user->identity->username;
                }
            ],
            [
                'attribute'=>'status',
                'label'=>'Holati',
                'value'=>function(\backend\modules\post\models\Post $model)
                {
                    return \backend\modules\post\models\Post::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\post\models\Post::getstatus(),
            ],
        ],
    ]) ?>

</div>
