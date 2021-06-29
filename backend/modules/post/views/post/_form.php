<?php

use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\Form;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">
    <? $form = ActiveForm::begin(
        ['options' => [
            'enctype' => 'multipart/form-data'
        ]
        ]
    ); ?>

    <?= $form->languageSwitcher($model) ?>
    <?php echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'title' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'title kiriting...']],
            'content' => [
                'type' => Form::INPUT_CKEDITOR,
                'options' => [
                    'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder')
                ]
            ],
            'category_id' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => \soft\helpers\ArrayHelper::map(\backend\modules\post\models\Postcategory::find()->all(), 'id', 'title'),
            ],
            'published_at:datetime',
            'status'=>['type'=>Form::INPUT_WIDGET,'widgetClass'=>\kartik\widgets\SwitchInput::class],
            'actions' => ['type' => Form::INPUT_RAW, 'value' => Html::submitButton('Submit', ['class' => 'btn btn-primary'])]
        ]
    ]);
    ActiveForm::end();
    ?>
</div>
