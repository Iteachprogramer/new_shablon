<?php

use kartik\builder\Form;
use kartik\switchinput\SwitchInput;
use soft\widget\kartik\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Postcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="postcategory-form">
    <? $form = ActiveForm::begin(
        ['options' => [
            'enctype' => 'multipart/form-data'
        ]
        ]
    ); ?>
    <?php echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'title' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'title kiriting...']],
            'status'=>['type'=>Form::INPUT_WIDGET, 'widgetClass' => SwitchInput::class],
            'actions' => ['type' => Form::INPUT_RAW, 'value' => Html::submitButton('Submit', ['class' => 'btn btn-primary'])],
        ]
    ]);
    ActiveForm::end();?>
</div>
