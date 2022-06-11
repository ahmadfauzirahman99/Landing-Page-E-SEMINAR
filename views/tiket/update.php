<?php

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */

$this->title = 'Update Tiket: ' . $model->id_tiket;
$this->params['breadcrumbs'][] = ['label' => 'Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tiket, 'url' => ['view', 'id' => $model->id_tiket]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>