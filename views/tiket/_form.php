<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="tiket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_seminar')->textInput() ?>

    <?= $form->field($model, 'harga_tiket')->textInput() ?>

    <?= $form->field($model, 'slot_tiket')->textInput() ?>

    <?= $form->field($model, 'lampiran_tiket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
