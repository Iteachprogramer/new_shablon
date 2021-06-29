<?php
use kartik\grid\GridView;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\post\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Yangiliklar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <p>
        <? $this->params['create']=Html::a('<span class="btn btn-primary" ><i class="fas fa-plus "></i></span>',['/post/post/create'],['style'=>'margin-right:10px']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class'=>\kartik\grid\SerialColumn::class,
                'contentOptions'=>function(\backend\modules\post\models\Post $model){
                    $class='';
                    switch ($model->status)
                    {
                        case \backend\modules\post\models\Post::STATUS_SHOWED:$class='alert-primary';break;
                        case \backend\modules\post\models\Post::STATUS_NOTSHOWED:$class='alert-danger';break;
                        default:$class='alert-info';
                    }
                    return['class'=>$class];
                }
            ],
            //'id',
            [
                'attribute'=>'title',
                'label'=>'title',
                'width'=>'350px',

            ],
           // 'category_id',
               [
                    'attribute' => 'category_id',
                    'label' => 'Yangilik turi',
                    'format' => 'html',
                     'value' => function($model){
                      return $model->category->title;
                }
                ],
             'published_at:date',
           // 'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            [
                'attribute'=>'status',
                'label'=>'status',
                'value'=>function(\backend\modules\post\models\Post $model)
                {
                    return \backend\modules\post\models\Post::getstatus()[$model->status];
                },
                'filter'=>\backend\modules\post\models\Post::getstatus(),
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
