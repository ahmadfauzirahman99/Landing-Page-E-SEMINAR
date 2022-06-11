<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sponsor */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="sponsor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_sponsor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gambar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_seminar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
