<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Postcategory */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Yangilik turi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="postcategory-view">

    <p>

        <? $this->params['update']=Html::a('<span class="btn btn-success" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-pen"></i></span>',['postcategory/update','id' => $model->id], ['style'=>'margin-right:10px']);?>
        <? $this->params['delete']=Html::a('<span class="btn btn-danger" style="padding-inline: 15px; font-size: 18px"><i class="fas fa-trash"></i></span>',['postcategory/delete','id' => $model->id],['data-method'=>"POST",'confirm' => 'Are you sure you want to delete this item?',],['style'=>'margin-right:10px']);?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            //'title_ru',
           // 'title_en',
           // 'slug',
            'created_at:date',
            'updated_at:date',
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
        ],
    ]) ?>

</div>
