<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Form Tambah Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'Pengguna', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="col-md-12">
        <?= $this->render('_form', [
            'model' => $model
        ]) ?>
    </div>
    <!--.card-->
</div>