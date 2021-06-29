<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\page\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sahifalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <p>
        <? $this->params['create']=Html::a('<span class="btn btn-primary" ><i class="fas fa-plus "></i></span>',['/page/page/create'],['style'=>'margin-right:10px']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class'=>\kartik\grid\SerialColumn::class,
                'contentOptions'=>function(\backend\modules\page\models\Page $model){
                    $class='';
                    switch ($model->status)
                    {
                        case \backend\modules\page\models\Page::STATUS_SHOWED:$class='alert-primary';break;
                        case \backend\modules\page\models\Page::STATUS_NOTSHOWED:$class='alert-danger';break;
                        default:$class='alert-info';
                    }
                    return['class'=>$class];
                }
            ],
            //'id',
           [
                   'attribute'=>'title',
                   'width' => '250px',
           ],
          //  'created_by',
            //'updated_by',
//            /'published_at:date',
            [
                'attribute'=>'content',
                'label'=>'content',
                'format'=>'html',
                'value'=>function($model){
                    return mb_substr(strip_tags($model->content),0,100);
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
