
<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\leader\models\LeaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rahbariyat';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="leader-index">
    <p>
        <? $this->params['create']=Html::a('<span class="btn btn-primary" ><i class="fas fa-plus "></i></span>',['/leader/leader/create'],['style'=>'margin-right:10px']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class'=>\kartik\grid\SerialColumn::class,
                'contentOptions'=>function(\backend\modules\leader\models\Leader $model){
                    $class='';
                    switch ($model->status)
                    {
                        case \backend\modules\leader\models\Leader::STATUS_SHOWED:$class='alert-primary';break;
                        case \backend\modules\leader\models\Leader::STATUS_NOTSHOWED:$class='alert-danger';break;
                        default:$class='alert-info';
                    }
                    return['class'=>$class];
                }
            ],            //'id',
            //'name',
            [
             'attribute' => 'name',
             'width'=>'200px',
             ],
            'position',
           // 'phone',
           // 'email:email',
            //'faks',
            [
                'attribute'=>'status',
                'label'=>'status',
                'value'=>function(\backend\modules\leader\models\Leader $model)
                {
                    return \backend\modules\leader\models\Leader::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\leader\models\Leader::getstatus(),
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
