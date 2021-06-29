<?php

use kartik\switchinput\SwitchInput;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yeesoft\multilingual\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model backend\modules\leader\models\Leadercategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leadercategory-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->languageSwitcher($model) ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), []); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
