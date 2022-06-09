<?php

/* @var $this yii\web\View */
/* @var $model app\models\SectionPertama */

$this->title = 'Update Menu Section Pertama: ' . $model->title;
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Section 1</p>
                </div>
                <div class="card-body">

                    <?= $this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>