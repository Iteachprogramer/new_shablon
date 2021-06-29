<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\useful\models\UsefulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foydali saytlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useful-index">

    <p>
        <? $this->params['create']=Html::a('<span class="btn btn-primary" ><i class="fas fa-plus "></i></span>',['/useful/useful/create'],['style'=>'margin-right:10px']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
               ['class'=>\kartik\grid\SerialColumn::class,
                'contentOptions'=>function(\backend\modules\useful\models\Useful $model){
                    $class='';
                    switch ($model->status)
                    {
                        case \backend\modules\useful\models\Useful::STATUS_SHOWED:$class='alert-primary';break;
                        case \backend\modules\useful\models\Useful::STATUS_NOTSHOWED:$class='alert-danger';break;
                        default:$class='alert-info';
                    }
                    return['class'=>$class];
                }
            ],
            //'id',
          //  'title',
            [
                    'attribute' => 'title',
                    'label' => 'nomi',
                    'width'=>'300px',
            ],
            //'img',
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
