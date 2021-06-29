<?php

use kartik\helpers\Html;
use kartik\grid\GridView;

/* @var $this kartik\web\View */
/* @var $searchModel backend\modules\post\models\PostcategorySearch */
/* @var $dataProvider kartik\data\ActiveDataProvider */

$this->title = 'Yangilik turi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postcategory-index">

    <p>
        <? $this->params['create']=Html::a('<span class="btn btn-primary" ><i class="fas fa-plus "></i></span>',['/post/postcategory/create'],['style'=>'margin-right:10px']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class'=>\kartik\grid\SerialColumn::class,
                'contentOptions'=>function(\backend\modules\post\models\Postcategory $model){
                    $class='';
                    switch ($model->status)
                    {
                        case \backend\modules\post\models\Postcategory::STATUS_SHOWED:$class='alert-primary';break;
                        case \backend\modules\post\models\Postcategory::STATUS_NOTSHOWED:$class='alert-danger';break;
                        default:$class='alert-info';
                    }
                    return['class'=>$class];
                }
            ],
            //'id',
         //   'slug',
           // 'created_at',
           // 'updated_at',
            //'status',
            'title',
            [
                    'attribute' => 'status',
                     'label' => 'Holati',
                      'format' => 'html',
                       'value' => function(\backend\modules\post\models\Postcategory $model)
                       {
                           return \backend\modules\post\models\Postcategory::getstatus()[$model->status];
                       },
                'filter' => \backend\modules\post\models\Postcategory::getstatus(),

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
