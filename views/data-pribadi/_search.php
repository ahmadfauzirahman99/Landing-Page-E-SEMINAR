<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataPribadiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_data_pribadi') ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'nama_lengkap') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'kewenegaraan') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'id_kel') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'id_kec') ?>

    <?php // echo $form->field($model, 'id_kab') ?>

    <?php // echo $form->field($model, 'id_prov') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
