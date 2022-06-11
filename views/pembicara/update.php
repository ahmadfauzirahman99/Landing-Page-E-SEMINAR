<?php

/* @var $this yii\web\View */
/* @var $model app\models\Pembicara */

$this->title = 'Update Pembicara: ' . $model->nama_pembicara;
$this->params['breadcrumbs'][] = ['label' => 'Pembicara', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_pembicara, 'url' => ['view', 'id' => $model->id_pembicara]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
    <!--.card-->
</div>