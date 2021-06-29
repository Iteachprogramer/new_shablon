<?php
/* @var $content string */

use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0">
                        <?php
                        if ($this->title !== null) {
                            echo $this->params['create']?? "";
                            echo $this->params['update'] ?? "";
                            echo $this->params['delete'] ?? "";
                            echo $this->params['index'] ?? "";

                        } else {
                            echo \yii\helpers\Inflector::camelize($this->context->id);
                        }
                        ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb float-sm-right'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?= Alert::widget() ?>
        <? if (isset($this->params['content']))
        {
            echo $content;
        }
        else{
            ?>
            <div class="card-outline card card-primary">
                <div class="card-body">
                    <div class>
                        <?= $content ?>

                    </div>
                </div>
            </div>
            <?
        }
        ?>
            </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>