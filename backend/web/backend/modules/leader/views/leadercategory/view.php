<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\leader\models\Leadercategory */
?>
<div class="leadercategory-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
