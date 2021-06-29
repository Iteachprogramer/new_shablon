<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\img\models\ImgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'rasimlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="img-index">

    <p>
        <? $this->params['create']=Html::a('<span class="btn btn-primary" ><i class="fas fa-plus "></i></span>',['/img/img/create'],['style'=>'margin-right:10px']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                    'class'=>\kartik\grid\SerialColumn::class,
                     'contentOptions'=>function(\backend\modules\img\models\Img $model){
                    $class='';
                    switch ($model->status)
                    {
                        case \backend\modules\img\models\Img::STATUS_SHOWED:$class='alert-primary';break;
                        case \backend\modules\img\models\Img::STATUS_NOTSHOWED:$class='alert-danger';break;
                        default:$class='alert-info';
                    }
                    return['class'=>$class];
                }
            ],
            //'id',
            //'title',
            [
                    'attribute'=>'title',
                'width' => '250px',
            ],
            //'content',
            [
                    'attribute' => 'created_by',
                    'label' => 'Yaratdi',
                    'value' => function(){
                      return Yii::$app->user->identity->username;
                    }
            ],
            [
                'attribute' => 'img',
                'label' => 'img',
                'format' => 'html',
                'value' => function(\backend\modules\img\models\Img $model){
                    return Html::img($model->img,['style'=>'width:50px;height:auto']);
                }
            ],
            'published_at:date',
            //'status',
            //'published_at:date',
          //  'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'slug',
            [
                'attribute'=>'status',
                'label'=>'Holati',
                'value'=>function(\backend\modules\img\models\Img $model)
                {
                    return \backend\modules\img\models\Img::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\img\models\Img::getstatus(),
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
            ]         ],
    ]); ?>


</div>
