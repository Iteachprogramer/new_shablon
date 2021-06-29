<?php

use kartik\switchinput\SwitchInput;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\Form;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->languageSwitcher($model) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'faks')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), []); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
