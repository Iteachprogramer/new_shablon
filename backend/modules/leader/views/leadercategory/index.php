<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\leader\models\LeadercategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Rahbariyat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadercategory-index">
    <p>
        <? $this->params['create']=Html::a('<span class="btn btn-primary" ><i class="fas fa-plus "></i></span>',['/leader/leadercategory/create'],['style'=>'margin-right:10px']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class'=>\yii\grid\SerialColumn::class,
                'contentOptions'=>function(\backend\modules\leader\models\Leadercategory $model){
                    $class='';
                    switch ($model->status)
                    {
                        case \backend\modules\leader\models\Leadercategory::STATUS_SHOWED:$class='alert-primary';break;
                        case \backend\modules\leader\models\Leadercategory::STATUS_NOTSHOWED:$class='alert-danger';break;
                        default:$class='alert-info';
                    }
                    return['class'=>$class];
                }
            ],
            //'id',
           // 'slug',
            'title',
           // 'created_at:date',
            'updated_at:date',
            //'status',
            [
                'attribute'=>'status',
                'label'=>'Holati',
                'value'=>function(\backend\modules\leader\models\Leadercategory $model)
                {
                    return \backend\modules\leader\models\Leadercategory::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\leader\models\Leadercategory::getstatus(),
            ],
            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update} {delete} {mark}',
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
