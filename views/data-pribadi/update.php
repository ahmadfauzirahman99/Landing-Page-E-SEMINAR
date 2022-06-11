<?php

/* @var $this yii\web\View */
/* @var $model app\models\DataPribadi */

$this->title = 'Update Data Pribadi: ' . $model->id_data_pribadi;
$this->params['breadcrumbs'][] = ['label' => 'Data Pribadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_data_pribadi, 'url' => ['view', 'id' => $model->id_data_pribadi]];
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