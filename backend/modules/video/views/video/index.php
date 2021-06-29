<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\video\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <p>
        <? $this->params['create']=Html::a('<span class="btn btn-primary" ><i class="fas fa-plus "></i></span>',['/video/video/create'],['style'=>'margin-right:10px']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class'=>\kartik\grid\SerialColumn::class,
                'contentOptions'=>function(\backend\modules\video\models\Video $model){
                    $class='';
                    switch ($model->status)
                    {
                        case \backend\modules\video\models\Video::STATUS_SHOWED:$class='alert-primary';break;
                        case \backend\modules\video\models\Video::STATUS_NOTSHOWED:$class='alert-danger';break;
                        default:$class='alert-info';
                    }
                    return['class'=>$class];
                }
            ],
           // 'id',
            'video',
            'url:url',
            [
                'attribute'=>'status',
                'label'=>'status',
                'value'=>function(\backend\modules\video\models\Video $model)
                {
                    return \backend\modules\video\models\Video::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\video\models\Video::getstatus(),
            ],
            [
                    'class' => 'kartik\grid\ActionColumn',
                'template'=>'{view} {update} {delete} {mark}',
                'width' => '250px',

                'buttons'=>[
                    'mark'=>function($url,$model,$key)
                    {
                        if ($model->status==1){
                            return Html::a('<span class="btn btn-primary"><i class="fas fa-check"></i></span>',$url);
                        }
                        else
                        {
                            return Html::a('<span class="btn btn-danger"><i class="fas fa-check"></i></span>',$url);
                        }
                    },
                    'view'=>function($url,$model,$key){
                        return Html::a('<span class="btn btn-info"><i class="fas fa-eye"></i></span>',$url);
                    },
                    'update'=>function($url,$model,$key){
                        return Html::a('<span class="btn btn-warning"><i class="fas fa-pen"></i></span>',$url);
                    },
                    'delete'=>function($url,$model,$key){
                        return Html::a('<span class="btn btn-danger"><i class="fas fa-trash"></i></span>',$url, ['data-method'=>"POST"]);
                    }
                ],
            ]   ,
        ],
    ]); ?>


</div>
