<?php

/* @var $this yii\web\View */
/* @var $model app\models\Seminar */

$this->title = 'Update Seminar: ' . $model->nama_seminar;
$this->params['breadcrumbs'][] = ['label' => 'Seminars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_seminar, 'url' => ['view', 'id' => $model->id_seminar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<style>
    .krajee-datepicker {
        z-index: 1600 !important;
        /* has to be larger than 1050 */
    }
</style>
<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
    <!--.card-->
</div>