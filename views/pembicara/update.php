<?php

/* @var $this yii\web\View */
/* @var $model app\models\Pembicara */

$this->title = 'Update Pembicara: ' . $model->nama_pembicara;
$this->params['breadcrumbs'][] = ['label' => 'Pembicara', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_pembicara, 'url' => ['view', 'id' => $model->id_pembicara]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
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