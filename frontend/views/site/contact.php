<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
<!-- VIDEO GALEREYA -->
<div class="video_gallery pt-4 pb-4 mx-auto d-flex flex-column justify-content-between">
    <h1 class="title">Video galereya</h1>
    <div class="container">
        <div class="video_gallery_items mx-auto d-flex justify-content-between row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 video_gallery_item">
                <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/TSOlcGgZwOA"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                <i class="far fa-play-circle" data-toggle="modal" data-target="#videoModal01"></i>
                <div class="modal fade" id="videoModal01" tabindex="-1" aria-labelledby="videoModal01Label"
                     aria-hidden="true">
                    <div class="modal-dialog  modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/TSOlcGgZwOA"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 video_gallery_item">
                <img src="images/slider_images/2.jpg" alt="" class="img_fluid">
                <i class="far fa-play-circle" data-toggle="modal" data-target="#videoModal02"></i>
                <div class="modal fade" id="videoModal02" tabindex="-1" aria-labelledby="videoModal02Label"
                     aria-hidden="true">
                    <div class="modal-dialog  modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <video width="100%" src="media/01.mp4" controls></video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="button">Barcha videolar</a>
</div>

